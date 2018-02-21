let mix = require('laravel-mix')

let scssOptions = {
    processCssUrls: false
}

let bundles = {
    'all': [
        './src/js/app.js'
    ]
}

let extractLibs = [
    'jquery',
]

mix
    .setPublicPath('./')
    .sass('src/scss/base.scss', 'assets/css').options(scssOptions)
    // Extract libraries requires ECMAScript 6 imports in your code.
    // .js(bundles.all, 'assets/js/app.js').extract(extractLibs)
    .js(bundles.all, 'assets/js/app.js')
    .version()