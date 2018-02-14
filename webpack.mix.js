let mix = require( 'laravel-mix' ).mix;

let scssOptions = {
    processCssUrls: false
};

let bundles = {
    'all': [
        './src/js/app.js'
    ]
};

mix.scripts( bundles.all, 'assets/js/app.js' ).
    sass( 'src/scss/base.scss', 'assets/css' ).options( scssOptions );
