let mix = require('laravel-mix')
let glob = require('glob-all')

require('laravel-mix-purgecss')

let scssOptions = {
    processCssUrls: false
}

let bundles = {
    'all': [
        './assets/vendor/jquery/dist/jquery.min.js',
        './assets/vendor/bootstrap/dist/js/bootstrap.bundle.js',
        './src/js/app.js'
    ]
}

let extractLibs = [
    'jquery'
]

const purgecssWordpress = {
    whitelist: [
        'rtl',
        'home',
        'blog',
        'archive',
        'date',
        'error404',
        'logged-in',
        'admin-bar',
        'no-customize-support',
        'custom-background',
        'wp-custom-logo',
        'pagination',
        'alignnone',
        'alignright',
        'alignleft',
        'wp-caption',
        'wp-caption-text',
        'screen-reader-text',
        'comment-list',
    ],
    whitelistPatterns: [
        /^rtl(-.*)?$/,
        /^home(-.*)?$/,
        /^blog(-.*)?$/,
        /^archive(-.*)?$/,
        /^date(-.*)?$/,
        /^error404(-.*)?$/,
        /^logged-in(-.*)?$/,
        /^admin-bar(-.*)?$/,
        /^no-customize-support(-.*)?$/,
        /^search(-.*)?$/,
        /^nav(-.*)?$/,
        /^wp(-.*)?$/,
        /^wp-block-(a-z)?$/,
        /^wp-custom-logo(-.*)?$/,
        /^screen(-.*)?$/,
        /^navigation(-.*)?$/,
        /^(.*)-template(-.*)?$/,
        /^(.*)?-?single(-.*)?$/,
        /^postid-(.*)?$/,
        /^post-(.*)?$/,
        /^attachmentid-(.*)?$/,
        /^attachment(-.*)?$/,
        /^page(-.*)?$/,
        /^(post-type-)?archive(-.*)?$/,
        /^author(-.*)?$/,
        /^gallery(-.*)?$/,
        /^category(-.*)?$/,
        /^tag(-.*)?$/,
        /^card(-.*)?$/,
        /^menu(-.*)?$/,
        /^tags(-.*)?$/,
        /^tax-(.*)?$/,
        /^term-(.*)?$/,
        /^date-(.*)?$/,
        /^(.*)?-?paged(-.*)?$/,
        /^says(-.*)?$/,
        /^depth(-.*)?$/,
        /^comment(-.*)?$/,
        /^comments(-.*)?$/,
        /^children(-.*)?$/,
        /^crnb(-.*)?$/,
        /^custom(-.*)?$/,
        /^custom-background(-.*)?$/,
        /^port-description(-.*)?$/
    ],
}

mix.autoload({
    'jquery': ['$', 'window.jQuery', 'jQuery']
})

mix
    .setPublicPath('./')

    .sass('src/scss/base.scss', 'assets/css').options(scssOptions)
    // Extract libraries requires ECMAScript 6 imports in your code.
    // .js(bundles.all, 'assets/js/app.js').extract(extractLibs)
   .js(bundles.all, 'assets/js/app.js')

   .purgeCss(
       {
           enabled: mix.inProduction(),
           paths: glob.sync([
               path.join(__dirname, 'templates/**/*.php'),
               path.join(__dirname, '/assets/js/**/*.js'),
           ]),
           extensions: ['html', 'js', 'php'],

           // Other options are passed through to Purgecss
           whitelist: purgecssWordpress.whitelist,
           whitelistPatterns: purgecssWordpress.whitelistPatterns,
       }
   )

   .version()


// Production
if (mix.inProduction()) {
    mix.options({
        terser: {
            terserOptions: {
                warnings: true
            }
        }
    })
} else {
    mix.webpackConfig({
        devtool: 'source-map',
    })

    mix.sourceMaps()
}

// BrowserSync and LiveReload on `npm run watch` command
//mix.browserSync({
//    proxy: 'http://wordpress.local',
//    port: 8080,
//    If you want to use HTTPS, update the proxy path
//    and add tour local certificate paths
//    https: {
//        key: '/your/certificates/location/your-local-domain.key',
//        cert: '/your/certificates/location/your-local-domain.crt'
//    },
//    files: [
//        '**/*.php',
//        'assets/css/**/*.css',
//        'assets/js/**/*.js',
//        '!node_modules',
//        '!vendor',
//    ],
//    ghostMode: false,
//    open: false,
//    injectChanges: true,
//})
