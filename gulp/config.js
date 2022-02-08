// Site name
const siteName = 'smartexport';

// Theme name
const themeName = 'smart';

// Theme path
const theme = `wp-content/themes/${themeName}`;

// Path to assets
const assets = `app/${theme}/assets/`;

// Product site address
const siteLocation = `/home/fa0946stspdl/public_html/${siteName}`;

module.exports = () => {

    // Site url
    const url = {
        loc: `http://${siteName}.loc`,
        prod: `https://${siteName}.eu`
    };

    const sshCfg = {
        host: '92.205.5.117',
        port: 21,
        username: 'fa0946stspdl',
        password: '$:dkzz0XA8'
        // privateKey: require('fs-extra').readFileSync(process.env.USERPROFILE + '\\.ssh\\bambuk_rsa')
    };

    // Database params
    const db = {
        loc: {
            name: "consulting",
            user: "root",
            pass: "",
            host: "localhost",
            prefix: 'smx_'
        },
        prod: {
            name: "smx",
            user: "smx",
            pass: "Ji5SCJqJF8)J",
            host: "92.205.5.117",
            prefix: 'smx_'
        }

    };

    // Pathes
    const path = {
        realPath: process.env.INIT_CWD,
        theme: theme,
        assets: assets,
        build: {
            css: `${assets}/css/`,
            js: `${assets}/js/`,
            img: 'src/img/',
            fonts: 'src/fonts/',
        },
        src: {
            img: 'src/img/',
            fonts: 'src/fonts/',
            scss: 'src/scss/**/*.scss',
            js: 'src/js/*.js'
        },
        watch: {
            scss: 'src/scss/**/*.+(css|scss)',
            js: 'src/js/**/*.js'
        }
    }

    const tasks = [
        './gulp/tasks/scss',
        './gulp/tasks/js',
        './gulp/tasks/ttf2woff',
        './gulp/tasks/imagemin',
        './gulp/tasks/imgresize',
        './gulp/tasks/webp',
        './gulp/tasks/db',
        './gulp/tasks/ssh',
        './gulp/tasks/watch'
    ];

    // Return conf to gulpfile
    return {
        siteLocation: siteLocation,
        sshCfg: sshCfg,
        theme: theme,
        url: url,
        db: db,
        path: path,
        tasks: tasks
    };
};