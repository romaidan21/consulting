// Compile SCSS & Build CSS
module.exports = function () {

    const postcssPlugins = {
        dev: [$.postcssImport, $.autoPrefixer],
        build: [$.postcssImport, $.autoPrefixer, $.webpInCss, $.cssnano({ preset: 'advanced' })]
    };

    const compileScss = mode => {

        return $.gulp.src($.path.src.scss)
            .pipe($.gp.sourcemaps.init())
            .pipe($.gp.sass())
            .pipe($.gp.plumber({ errorHandler: $.onError }))
            .pipe($.gp.postcss(postcssPlugins[mode]))
            .pipe($.gp.rename('styles.css'))
            .pipe($.gp.sourcemaps.write('./'))
            .pipe($.gulp.dest($.path.build.css))
            .pipe($.gp.notify({ message: `SCSS compiled (${mode})!`, onLast: true }));
    }

    // SCSS compile tasks
    $.gulp.task('scss', () => {
        return compileScss('dev');
    });

    $.gulp.task('scss:prod', () => {
        return compileScss('build');
    });
}
