module.exports = function () {

    const srcOpts = {
        base: $.path.app,
        dot: true,
        buffer: false,
        allowEmpty: true
    }

    const gulpSSH = new $.gp.ssh({
        ignoreErrors: false,
        sshConfig: $.sshCfg
    })

    // ============================================================================ Tasks

    $.gulp.task('testSSH', function () {
        return gulpSSH
            .exec(['ls -a', 'pwd'], { filePath: 'commands.log' })
            .pipe($.gulp.dest('logs'));
    })

    $.gulp.task('copyAppToTest', function () {
        return deploy(`${$.path.app}/**`, $.siteName, true);
    })

    $.gulp.task('testAccess', function () {
        return gulpSSH.exec([
            `cp -f ${$.siteLocation}/.htaccess-test ${$.siteLocation}/.htaccess`,
            `find ${$.siteLocation}/ -type f -print0 | xargs -0 chmod 644`,
            `find ${$.siteLocation}/ -type d -print0 | xargs -0 chmod 755`
        ]);
    })

    $.gulp.task('testThemeAccess', function () {
        return gulpSSH.exec([
            `find ${$.siteLocation}/${$.path.theme}/ -type f -print0 | xargs -0 chmod 644`,
            `find ${$.siteLocation}/${$.path.theme}/ -type d -print0 | xargs -0 chmod 755`
        ]);
    })

    $.gulp.task('copyThemeToTest', function () {
        return deploy(`${$.path.app}/${$.path.theme}/**`, `${$.siteName}`);
    })

    $.gulp.task('delTestTheme', function () {
        return remove(`${$.siteName}/${$.path.theme}`);
    })

    $.gulp.task('delTestApp', function () {
        return remove($.siteName);
    })

    $.gulp.task('archiveTest', function () {
        return createArchive($.path.testServer, $.siteName);
    })

    $.gulp.task('downloadTestArchive', function () {
        return downloadArchive($.path.testServer, $.siteName);
    })

    // ======================================================================= Functions
    function deploy(src, dest) {

        return $.gulp.src(src, srcOpts)
            .pipe(gulpSSH.dest($.path.testServer + dest).on('end', () => {
                console.log(`${src} send to ${$.path.testServer}${dest}`);
            }));
    }

    function remove(dest) {
        return gulpSSH.exec([`rm -rf ${$.path.testServer}` + dest])
            .pipe($.gp.notify({ message: `${$.path.testServer}${dest} deleted`, onLast: true }));
    }

    function createArchive(path, folder) {
        return gulpSSH.exec(`tar cvzf ${path}${folder}.tar.gz -C ${path} ${folder}`);
    }

    function downloadArchive(path, folder) {

        let moveQuery = `scp ${$.sshCfg.username}@${$.sshCfg.host}:${path}${folder}.tar.gz ${$.path.app}/`;
        let removeTarQuery = `rm ${path}${folder}.tar.gz`;

        return $.shell.exec(moveQuery, (code, stdout, stderr) => {
            return gulpSSH.exec(removeTarQuery);
        });
    }
}