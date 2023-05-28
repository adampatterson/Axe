# Axe

Axe is a simple bare-bones WordPress starter theme and structure. It is a theme meant to get you set up and running as
fast as possible.

My build workflow might not be very orthodox, but I typically review the design, Set up my Custom post types
using [Custom Post Type UI](https://en-ca.wordpress.org/plugins/custom-post-type-ui/) and setup any page data structures
using [ACF](http://www.advancedcustomfields.com/).

Simply being able to plow ahead creating my site structures and loading in real or fake content lets me have something
tangible to work with.

Another tip that I can provide is using `console.log` to output my ACF structures reducing the need to be to refer back
to the admin pages.

```php
/*
 * Load this in your footer, and
 * check to see if the user is logged in.
 * /
<? $data = get_fields();?>
<script>
    console.log(<?= json_encode($data) ?>)
</script>
```

The theme includes a file called `/templates/partials/admin-helper.php` that can be used to output more detail, such as Options, Post, WooCommerce, and extra ACF data.

## Supports

-   Favicon
-   [Header Image](https://codex.wordpress.org/Custom_Headers)
-   [Background Image](https://codex.wordpress.org/Custom_Backgrounds)

## Theme Structure

    Axe/
    ├── acf-json/
    │   └── ...
    ├── assets/
    │   └── ...
    │   └── css
    │   └── fonts
    │   └── ico
    │   └── img
    │   └── js
    │   └── vendor
    ├── lib/
    │   └── ...
    ├── node_modules/
    │   └── ...
    ├── src/
    │   └── ...
    │   └── js
    │   └── scss
    ├── templates/
    │   └── ...
    │   └── partials/
    │   └── partials/loop-{type}.php
    │   └── partials/blocs/
    │   └── content-{slug}.php
    │   └── single-{slug}.php
    │   └── sub-{parent_slug}.php
    ├── vendor/
    │   └── ...
    ├── woocommerce/
    │   └── ...
    ├── composer.json
    ├── package.json
    └── webpack.mix.js

## Getting Set up

`npm i && php composer i && npm run prod`

## Build

A `package.json` file with Bootstrap and jQuery is included.

The [src folder](https://github.com/adampatterson/Axe/tree/master/src) stores your SASS and JS that will be compiled
into `/assets` using [Laravel Mix](https://laravel.com/docs/5.8/mix).

If you are looking for a more advanced Mix configuration, then have a look at the official docs.

**Mix Installation & Setup**
https://laravel.com/docs/master/mix#installation

-   The `webpack.mix.js` file is located in the theme root directory
-   `npm run watch` to start browserSync with LiveReload and proxy to your custom URL
-   `npm run dev` to quickly compile and bundle all the assets without watching
-   `npm run prod` to compile the assets for production

# General Concepts

### Templates

@todo templates

### Partials

@todo partials

### Child Themes

@todo child theme

### Models

Models should be added to the child theme as they would be site specific.

By adding your custom WordPress queries to a model, you can keep your code nice and organized.

Let's pretend that we are working with an automotive website, and we have a number of posts under a custom post type
called `vehicles` and they are tagged with a `style`.

```php
<?php

namespace Handle\Custom;

class Model extends \Axe\Core\Model
{
    static function getVehicleByStyle($styleSlug)
    {
        return new \WP_Query([
            'post_type' => 'vehicles',
            'tax_query' => [
                [
                    'taxonomy' => 'style',
                    'terms'    => [$styleSlug],
                    'field'    => 'slug',
                ]
            ]
        ]);
    }
}
```

_Related, `/lib/data.php` contains the data that will be loaded in each page and passed through to each included template if using the `get_template_part_acf()` method._

### Extending Classes

A lot of the core functionality in Axe can be extended in a child theme.

A very basic example could be `Axe\Core\Network::class`.

Create a new file in your child theme.

```php
namespace Handle\Custom;

class Network extends \Axe\Core\Network
{
    public function register()
    {
        parent::__construct();
    }

    public function SomethingNew(){
        ...
    }
}
```

### Composer

## Home page

Placing a file under `templates/content-home.php` will resolve the home page and would be used by `/`

## Page templates

Placing a file under `templates/content-{slug}.php` will resolve the home page. Using `content-contact.php` would be
used by `/contact`

## Sub Page templates

Placing a file under `templates/sub-{parent_slug}.php` will resolve the home page. Using `sub-services.php` would be
used by all pages under service like `/services/design`

## Post format templates

Placing a file under `templates/format-video.php` will resolve all video formats.

## Custom Post Type templates

Placing a file under `templates/single-books.php` will resolve all custom post type single posts.

## Custom Taxonomies

Placing a file under `templates/archive-books.php` will resolve a custom taxonomy for Books `/books/sci-fi/` also using
a custom loop. The default archive would be `archive-default.php` using the default post loop.

## Custom Loops

If you have a custom post type called Books, creating `content-books.php` and loading a custom loop
like `loop-books.php` with all the necessary "Loop" code would give you your custom book loop.

See [loop-post.php](https://github.com/adampatterson/Axe/blob/master/templates/loop-post.php) for an example.

## Helper Functions

Axe uses composer to load the majority of the core helper functions, learn
more [here](https://github.com/adampatterson/Axe-Helpers).

The Axe Helpers will load a couple packages

-   nesbot/carbon
-   tightenco/collect
-   laravel/helpers"

---

`mix()` - Allows you to use Laravel Mix with
WordPress [read more here](https://www.adampatterson.ca/2018/axe-handle-updated-to-include-webpack-mix/).

`mix($filepath, $useParent = true)` - In some cases the core theme might be used with a network site and will require
the ability to load assets from both the Child and Parent theme. Omitting useParent will keep the same functionality.

---

`get_template_part_acf()` - Works exactly like `get_template_part()` except that it uses an include. This makes it more
suitable to use with ACF. You can include your custom content once which is already done for you. Have a
look [here](https://github.com/adampatterson/Axe/blob/master/index.php#L2).

---

`__t()` - Returns the template directory, It should be noted that this is easily overwritten in the child theme.

`__a()`- Returns the assets relative to the template directory. `/assets/`

`__j()` - Prints the JS path. `/assets/js/`

`__i()` - Prints the Images path `/assets/img/`

`__c()` - Prints the CSS path `/assets/css/`

`__v()` - Prints the Vendor path (Bower, other libraries) `/assets/vendor/`

`__lib($path)` - Returns the lib path (custom theme classes like Navigation walkers)`/lib/`

`__m()` - Returns the `mix-manifest.json` file path.

`__video()` - Echos the video path. `/assets/video/`

---

`is_sub_page()` - Used to determine if you are on a subpage.

`show_template()` -

`get_the_logo()` -

`if_custom_logo()` -

---

### Array Helper Functions

`_get()` - alias for `Arr::get($haystack, $needle, $default = false)`

    <?= _get($block, 'title', 'Default Title') ?>

```php
foreach (_get($block, 'block.items', []) as $item):
    ...
endforeach;
```

`_has()` - alias for `_Arr::has($haystack, $needle)`

```php
if (_has($block, 'contact.phone', false)): ?>
    ...
endif;
```

_Functions in the parent theme should be wrapped with `function_exists` extend the child theme and prevent any
conflicts._

---

```php
 $loop = new Axe\Core\TheLoop;
 while ($loop->have_posts()) : the_post();
      $loop->first()
      $loop->index()
      $loop->iteration()
      $loop->count()
      $loop->even()
      $loop->odd()
      $loop->last()
 endwhile;
```

@todo: Widgets

## Style

```
@import "components/base-variables";
@import "~bootstrap/scss/bootstrap";
```

With the addition of PurgeCSS to the build script you can safely include the entire Bootstrap library. Once a production
build has been done, any unused CSS classes will be removed.

`base-variables` holds any site specific variables that you might need including any
Bootstrap [customizations](https://getbootstrap.com/docs/5.1/customize/sass/)

[PurgeCss](https://github.com/FullHuman/purgecss) supports white listing of css class names, some defaults have been
included in the `webpack.mix.js`
file [here](https://github.com/adampatterson/Handle/blob/68bdd609a582baa4df0cadec67bf0d437bb60029/webpack.mix.js#L21).

It's also possible
to [whitelist](https://github.com/FullHuman/purgecss-docs/blob/master/whitelisting.md#in-the-css-directly) specific
classes or chunks of css.

## Dummy Content for Gutenberg

Sridhar Katakam has provided an article outlining how to
add [dummy content for Gutenberg](https://sridharkatakam.com/dummy-content-for-gutenberg/).

# Child theme

https://github.com/adampatterson/Handle

Opening `/lib/Helpers.php` and uncommenting the function
on [line 6](https://github.com/adampatterson/Handle/blob/master/lib/Helpers.php#L6) would allow the child theme to serve
all of your themes assets.

## Recommended Plugins

**Axe will require a couple of plugins to run:**

-   Advanced Custom Fields **Required**
-   Custom Post Type UI
-   WooCommerce
-   JetPack

## To-Do's

-   Create a model for ACF and other data sources
-   Document a lot of the inner code such as helpers
-   Document included packages
-   Document the build process
-   Document Child theme process using ( Handle )
-   Build out a demo theme ( Blade )
-   Update to Bootstrap 5
-   Fix WebPack PurgeCSS

### Credits

Template tags are heavily modified versions of [\_S](http://underscores.me/), Class registration was inspired
by [Alecaddd](https://github.com/Alecaddd/awps)

### Contributors:

Adam Patterson ( [@adampatterson](http://twitter.com/adampatterson)
/ [adampatterson.ca](https://www.adampatterson.ca/) )

### Disclaimer

This theme reflects my workflow and process, with that said, If you have anything to add please email me at
hello@adampatterson.ca

#### Local Development

    ln -s ~/Sites/cms/wordpress/wp-content/themes/Blade ./
    ln -s ~/Sites/cms/wordpress/wp-content/themes/Axe ./
    ln -s ~/Sites/cms/wordpress/wp-content/themes/AxeAxe-Helpers ./Axe/vendor/adampatterson
