// Minify all images
module.exports = function() {
    $.gulp.task('imagemin', function() {
        return $.gulp.src($.path.src.img + '**/*.{png,gif,jpg,jpeg,svg}')
            .pipe($.gp.plumber({ errorHandler: $.onError }))
            .pipe($.gp.imagemin([
                $.gp.imagemin.gifsicle({ interlaced: true }),
                $.gp.imagemin.jpegtran({ quality: 100, progressive: true }),
                $.gp.imagemin.optipng({ optimizationLevel: 7 }),
                $.gp.imagemin.svgo({
                    plugins: [
                        // { removeViewBox: true },
                        { cleanupIDs: true }
                    ]
                })
            ], { verbose: true }))
            .pipe($.gulp.dest($.path.build.img + '/compressed/'))
            .pipe($.gp.notify({ message: 'Images optimized!', onLast: true }));
    });
};