let mix = require('laravel-mix')

let scssOptions = {
    processCssUrls: false
}

let bundles = {
    'all': [
        './src/js/app.js'
    ]
}

mix
    .setPublicPath('./')
    .sass('src/scss/base.scss', 'assets/css').options(scssOptions)
    .scripts(bundles.all, 'assets/js/app.js')
    .version()