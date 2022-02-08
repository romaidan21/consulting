// Database create, backup & update
module.exports = function () {

    /** LOCAL */

    // Create local DB
    $.gulp.task('db:c', cb => {

        let query = 'mysql -u ' + $.db.loc.user + ' -e"' + 'CREATE DATABASE `' + $.db.loc.name +
            '` CHARACTER SET utf8 COLLATE utf8_general_ci"';

        if ($.shell.exec(query).code !== 0) {
            console.error(`Database ${$.db.loc.name} create error`);
            done(cb);
        } else {
            console.log(`Database ${$.db.loc.name} created`);
            updateDB('loc', cb);
        }
    });

    // Backup local DB
    $.gulp.task('db:b', cb => {
        backupDB('loc', cb);
    });

    // Update local DB
    $.gulp.task('db:u', cb => {
        updateDB('loc', cb);
    });

    // Migrate DB from test
    $.gulp.task('db:migrateFromTest', cb => {
        migrateDB('test', 'loc', cb);
    });

    // Migrate DB from prod
    $.gulp.task('db:migrateFromProd', cb => {
        migrateDB('prod', 'loc', cb);
    });


    /** TEST */

    // Update test DB
    $.gulp.task('db:u-test', cb => {
        updateDB('test', cb);
    });

    // Backup test DB
    $.gulp.task('db:b-test', cb => {
        backupDB('test', cb);
    });

    // Update siteurl in test DB
    $.gulp.task('db:migrateToTest', cb => {
        migrateDB('loc', 'test', cb);
    });

    /** PRODUCTION */

    // Update production DB
    $.gulp.task('db:u-prod', cb => {
        updateDB('prod', cb);
    });

    // Backup production DB
    $.gulp.task('db:b-prod', cb => {
        backupDB('prod', cb);
    });

    // Update siteurl in production DB
    $.gulp.task('db:migrateToProd', cb => {
        migrateDB('loc', 'prod', cb);
    });

    /** FUNCTIONS */

    // Update DB
    function updateDB(location, cb) {

        let db = $.db[location];
        let askPass = (location === 'loc') ? '' : ` -p${db.pass}`;
        let query = `mysql -u${db.user}${askPass} -h${db.host} ${db.name} < ${$.db.loc.name}.sql`;

        ($.shell.exec(query).code !== 0)
            ? console.error(`Database "${db.name}" import failed`)
            : console.log(`Database "${db.name}" updated`);
        done(cb);
    }

    // Backup DB
    function backupDB(location, cb) {

        let db = $.db[location];
        let askPass = (location === 'loc') ? '' : ` -p${db.pass}`;
        let query = `mysqldump --disable-keys -u${db.user}${askPass} -h${db.host} ${db.name} > ${$.db.loc.name}.sql`;

        ($.shell.exec(query).code !== 0)
            ? console.error('Dump export failed')
            : console.log(`Dump of "${db.name}" saved as "${$.db.loc.name}.sql"`);
        done(cb);
    }

    // Update urls in db
    function migrateDB(oldLoc, newLoc, cb) {

        let db = $.db[newLoc];
        let pref = db.prefix;
        let askPass = (newLoc === 'loc') ? '' : ` -p${db.pass}`;

        let oldUrl = $.url[oldLoc];
        let newUrl = $.url[newLoc];

        // Update home/site urls
        let sql1 = `UPDATE ${pref}options SET option_value = replace(option_value, '${oldUrl}', '${newUrl}') WHERE option_name = 'home' OR option_name = 'siteurl';`;

        // Update posts guids
        let sql2 = `UPDATE ${pref}posts SET guid = REPLACE (guid, '${oldUrl}', '${newUrl}');`;
        let sql3 = `UPDATE ${pref}posts SET guid = REPLACE (guid, '${oldUrl}', '${newUrl}') WHERE post_type = 'attachment';`;

        // Update links in content
        let sql4 = `UPDATE ${pref}posts SET post_content = REPLACE (post_content, '${oldUrl}', '${newUrl}');`;

        // Update links in attachments
        let sql5 = `UPDATE ${pref}posts SET post_content = REPLACE (post_content, 'src=${oldUrl}', 'src=${newUrl}');`;

        // Update links in meta
        let sql6 = `UPDATE ${pref}postmeta SET meta_value = REPLACE (meta_value, 'src=${oldUrl}', 'src=${newUrl}');`;

        // Run query
        let query = `mysql -u${db.user}${askPass} -h${db.host} ${db.name} -e "${sql1} ${sql2} ${sql3} ${sql4} ${sql5} ${sql6}"`;

        // console.log(query);

        ($.shell.exec(query).code !== 0)
            ? console.error(`Database "${db.name}" process failed`)
            : console.log(`All urls/guids updated to "${newUrl}"`);
        done(cb);
    }

    // Await callback
    function done(cb) {
        cb();
        setTimeout(() => {
            $.shell.exit(1);
        }, 200);
    }
};