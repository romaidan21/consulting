// Run watch as default task
$.gulp.task('default', $.gulp.series('watch'));

/**
 *
 * =========================================================== COMPILE
 */

// CSS & JS build task
$.gulp.task('build', $.gulp.series($.gulp.parallel('scss:prod', 'js:prod')));

// Fonts convert
$.gulp.task('ttf2woff', $.gulp.series($.gulp.parallel('to-woff', 'to-woff2')));


/**
 * =========================================================== SSH
 */

// Save current local DB to dump and then export to production server
$.gulp.task('db-to-prod', $.gulp.series('db:b', 'db:u-prod', 'db:migrateToProd'));

// Save production server DB to dump and then export to local server
$.gulp.task('db-from-prod', $.gulp.series('db:b-prod', 'db:u', 'db:migrateFromProd', 'db:b'));


