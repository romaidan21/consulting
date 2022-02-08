// Convert images to WebP
module.exports = function() {
    $.gulp.task('webp', function() {
        return $.gulp.src($.path.src.img + '**/*.{png,gif,jpg,jpeg}')
            .pipe($.gp.plumber({ errorHandler: $.onError }))
            .pipe($.gp.webp({quality: 100}))
            .pipe($.gulp.dest($.path.build.img + '/webp/'))
            .pipe($.gp.notify({ message: 'Images converted!', onLast: true }));
    });
};
