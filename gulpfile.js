// Load configuration file
const cfg = require('./gulp/config.js')();

// Set global variables
global.$ = {

    siteName: cfg.siteName,
    theme: cfg.theme,
    db: cfg.db,
    sshCfg: cfg.sshCfg,
    url: cfg.url,
    path: cfg.path,
    tasks: cfg.tasks,

    // Main tools
    webpackStream: require('webpack-stream'),
    gulp: require('gulp'),
    gp: require('gulp-load-plugins')(),
    shell: require('shelljs'),
    fs: require('fs-extra'),

    // PostCSS plugins
    autoPrefixer: require('autoprefixer'),
    postcssImport: require('postcss-import'),
    responsiveFont: require('postcss-responsive-font'),
    webpInCss: require('webp-in-css/plugin'),
    cssnano: require('cssnano'),

    // Error notify => send explanation to console
    onError: err => {
        $.gp.notify({
            title: 'GulpTask Error',
            message: 'Check the console.'
        });
        console.log(err.toString());
    }
};

// Append tasks pathes
$.tasks.forEach(path => {
    require(path)();
});

// Gulp tasks
require('./gulp/tasks.js');


// Show environment
// $.gulp.task('env', function () {
//     console.log(process.env);
// });