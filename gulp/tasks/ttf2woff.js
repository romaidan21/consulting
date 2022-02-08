module.exports = function() {

    // Convert ttf to woff
    $.gulp.task('to-woff', function() {
        return $.gulp.src($.path.src.fonts + '**/*.ttf')
        .pipe($.gp.plumber({ errorHandler: $.onError }))
        .pipe($.gp.ttf2woff())
            .pipe($.gulp.dest($.path.src.fonts + '/woff/'))
            .pipe($.gp.notify({ message: 'TTF to WOFF Converted!', onLast: true }));
        });

    // Convert ttf to woff2
    $.gulp.task('to-woff2', function() {
        return $.gulp.src($.path.src.fonts + '**/*.ttf')
            .pipe($.gp.plumber({ errorHandler: $.onError }))
            .pipe($.gp.ttf2woff2())
            .pipe($.gulp.dest($.path.src.fonts + '/woff/'))
            .pipe($.gp.notify({ message: 'TTF to WOFF2 Converted!', onLast: true }));
    });
};