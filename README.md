Axe
==

Axe is a simple bare bones WordPress starter structure. It is a theme meant to be a starting point to get you setup and running as fast as possible.

My build workflow might not be very orthodox but I typically review the design, Setup my Custom post types using [Custom Post Type UI](https://en-ca.wordpress.org/plugins/custom-post-type-ui/) and setup any page data structures using [ACF](http://www.advancedcustomfields.com/).

Simply being able to plow ahead creating my site structures and loading in real or fake content lets me have something tangible to work with.

Another tip that I can provide is using `console.log` to output my ACF structures reducing the need to be to refer back to the admin pages. Check it out [here](https://gist.github.com/adampatterson/711a101d5d93f3226fe1).

### Build
Included is a bower file preset with Bootstrap SASS, jQuery and a couple other commonly used packages. Bower will install packages to `/src/vendor`.

The [src folder](https://github.com/adampatterson/Axe/tree/master/src) stores your SASS and JS that should be compiled into `/assets`.

Use whatever build tool you want. A CodeKit file has been included to get up and running FAST. There is also an optional basic Webpack config that takes advantage of [Laravel Mix](https://laravel.com/docs/5.8/mix). If you are looking for a more advanced Mix configuration then have a look at the officual docs.

**Mix Installation**
https://laravel.com/docs/5.8/mix#installation

**Running Mix**
https://laravel.com/docs/5.8/mix#running-mix
* The `webpack.mix.js` file is located in the theme root directory
* `npm run watch` to start browserSync with LiveReload and proxy to your custom URL
* `npm run dev` to quickly compile and bundle all the assets without watching
* `npm run prod` to compile the assets for production

## Home page
Placing a file under `templates/content-home.php` will resolve the home page and would be used by `/`

### Page templates
Placing a file under `templates/content-{slug}.php` will resolve the home page. Using `content-contact.php` would be used by `/contact`

### Sub Page templates
Placing a file under `templates/sub-{parent_slug}.php` will resolve the home page. Using `sub-services.php` would be used by all pages under service like `/services/design`

### Post format templates
Placing a file under `templates/format-video.php` will resolve all video formats.

### Custom Post Type templates
Placing a file under `templates/single-books.php` will resolve all custom post type single posts.

### Custom Taxonomies
Placing a file under `templates/archive-books.php` will resolve a custom taxonomy for Books `/books/sci-fi/` also using a custom loop. The default archive would be `archive-default.php` using the default post loop.

### Custom Loops
If you have a custom post type called Books, creating `content-books.php` and loading a custom loop like `loop-books.php` with all the necessary "Loop" code would give you your custom book loop.

See [loop-post.php](https://github.com/adampatterson/Axe/blob/master/templates/loop-post.php) for an example.

## Helper Functions

`mix()` - Allows you to use Laravel Mix with WordPress [read more here](https://www.adampatterson.ca/2018/axe-handle-updated-to-include-webpack-mix/)

`get_template_part_acf()` - Works exactly like `get_template_part()` except that it uses an include making it more suitable to use with ACF. You can include your custom content once which is already done for you. Have a look [here](https://github.com/adampatterson/Axe/blob/master/index.php#L2).

`is_sub_page()` - Used to determine if you are on a sub page.

`__t()` - Returns the template directory, It should be noted that this is easily over written in the child theme.

`__a()`- Returns the assets relative to the template directory. `/assets/`

`__j()` - Prints the JS path. `/assets/js/`

`__i()` - Prints the Images path `/assets/img/`

`__c()` - Prints the CSS path `/assets/css/`

`__v()` - Prints the Vendor path (Bower, other libraries) `/assets/vendor/`

`__lib($path)` - Returns the lib path (custom theme classes like Navigation walkers)`/lib/`

`__m()` - Returns the `mix-manifest.json` file path.

`__video()` - Echos the video path. `/assets/video/`

*Functions in the parent theme should be wrapped with `function_exists` extend the child theme and prevent any conflicts.*


## Style
```
@import "components/base-variables";
@import "components/bootstrap-variables";
@import "components/bootstrap-custom";
```
Since loading Bootstrap from the vendor folder means you can't modify your variables without risk over overwriting them, A copy has been made in the `/src` folder.

`base-variables` houses any site specific variables that you might need.

`bootstrap-custom` allows you to easily comment out any unused Bootstrap code that you wont be using. This lets you output a more minimal css file.

### Structure

Another helpful inclusion is the [_structure.scss](https://github.com/adampatterson/Axe/blob/master/src/scss/components/_structure.scss) file which gives you 5px incremental adjustments to padding and margins through out HTML.

**For example:**

```
<div class="p-top-50 p-sm-top-15 m-30"></div>
```

This would result in a 50px padding for everything except small where you would end up with a 15px top padding. This div would also have a margin of 30 on all sides.

## Dummy Content for Gutenberg
Sridhar Katakam has provided an article outlining how to add [dummy content for Gutenberg](https://sridharkatakam.com/dummy-content-for-gutenberg/). 

### Child theme
https://github.com/adampatterson/Handle

If you will be using ACF with your child theme uncomment the [following](https://github.com/adampatterson/Handle/blob/master/functions.php#L13) so that ACF will store the `.json` files in your working Child theme.

Opening `theme-helpers.php` and uncommenting the function on [line 6](https://github.com/adampatterson/Handle/blob/master/lib/theme-helpers.php#L6) would allows the child theme to serve all of your themes assets.


### Credits
Template tags are heavily modified versions of [_S](http://underscores.me/)


#### Disclaimer
This theme is made for Me, and with my efficiencies in mind. That said, If you have anything to add then send me an email hello@adampatterson.ca
