// JS compile
module.exports = function () {

  const compileJS = mode => {

    return $.gulp.src($.path.src.js)
      .pipe($.gp.plumber({ errorHandler: $.onError }))
      .pipe($.webpackStream({
        mode: mode,
        output: {
          filename: 'scripts.js',
        },
        devtool: 'source-map',
        externals: {
          jquery: 'jQuery'
        },
        module: {
          rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
              loader: 'babel-loader',
              options: {
                presets: ['@babel/preset-env']
              }
            }
          }]
        }
      }))
      .pipe($.gulp.dest($.path.build.js))
      .pipe($.gp.notify({ message: `JS compiled! (${mode} mode)`, onLast: true }));
  }

  // Compile JS tasks
  $.gulp.task('js', () => {
    return compileJS('development');
  });

  $.gulp.task('js:prod', () => {
    return compileJS('production');
  });

};