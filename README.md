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
 */
<? $data = get_fields();?>
<script>
    console.log(<?= json_encode($data) ?>)
</script>
```

The theme includes a file called `/templates/partials/admin-helper.php` that can be used to output more detail, such as
Options, Post, WooCommerce, and extra ACF data.

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
    │   └── blocks/
    │   └── partials/
    │   └── partials/loop-{type}.php
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

```shell
npm i && php composer i && npm run prod
```

## Building Assets

A `package.json` file with Bootstrap and jQuery is included.

The [src folder](https://github.com/adampatterson/Axe/tree/master/src) stores your SCSS and JS that will be compiled
into `/assets` using Laravel Mix.

If you are looking for a more advanced Mix configuration, then have a look at
the [official docs](https://laravel-mix.com/docs/6.0/installation).

**Mix Installation & Setup**
https://laravel.com/docs/master/mix#installation

- The `webpack.mix.js` file is located in the theme root directory
- `npm run watch` to start browserSync with LiveReload and proxy to your custom URL
- `npm run dev` to quickly compile and bundle all the assets without watching
- `npm run prod` to compile the assets for production
- `mix()` - Allows you to use Laravel Mix with
  WordPress [read more here](https://www.adampatterson.ca/2018/axe-handle-updated-to-include-webpack-mix/).

`mix($filepath, $useParent = true)` - In some cases the core theme might be used with a network site and will require
the ability to load assets from both the Child and Parent theme. Omitting useParent will keep the same functionality.

# General Concepts

### Templates

@todo templates

### Partials

@todo partials

### Child Themes

https://github.com/adampatterson/Handle

If you will be using ACF with your child theme uncomment
the [following](https://github.com/adampatterson/Handle/blob/master/lib/Custom.php#L12) so that ACF will store
the `.json` files in your working Child theme.

---

### Data

`/lib/data.php` contains the data that will be loaded in each page and passed through to each included
template if using the `get_acf_part()` method.

### Models

Models should be added to the child theme as they would be site specific.

By adding your custom WordPress queries to a model, you can keep your code nice and organized.

Let's pretend that we are working with an automotive website, and we have a number of posts under a custom post type
called `vehicles` and they are tagged with a `make`.

```php
<?php

namespace Handle\Custom;

class Model extends \Axe\Models\Content
{
    static function getVehicleByMake($makeSlug)
    {
        return new \WP_Query([
            'post_type' => 'vehicles',
            'tax_query' => [
                [
                    'taxonomy' => 'make',
                    'terms'    => [$makeSlug],
                    'field'    => 'slug',
                ]
            ]
        ]);
    }
}
```

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
        // Some new code here
    }
}
```

---

## Templating

[The Template File Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/#the-template-file-hierarchy)

- **archive.php**
    - Archive - `archive-default.php`
- **single.php**
    - Single CPT - `single-{slug}.php`
    - [Post Format](https://developer.wordpress.org/advanced-administration/wordpress/post-formats/#supported-formats) - `format-{format}.php`
    - Attachment - `single-attachment.php`
- **page.php**
    - Home - `content-home.php`
    - Sub Page - `sub-{slug}.php`
    - Single Page - `content-{slug}.php`
    - Page - `content-page.php`
- **404.php**
    - 404 - `content-404.php`
- **search.php**
    - Search - `content-search.php`
- **index.php**
    - Home - `content-home.php`

### Home page

Accessing `/` will resolve the home page and look for the file `templates/content-home.php`

### Page templates

- Accessing `/contact` will load the file `templates/content-contact.php`.
- Accessing `/{slug}` will load the file `templates/content-{slug}.php`
- Accessing `/no-custom-file` will load the default `templates/content-page.php`

### Sub Page templates

- Accessing `/services/design` will load the file `templates/sub-{parent_slug}.php`
- Accessing `/services/no-custom-file` will load the default `templates/content-page.php`

### Post format templates

- A post format of `standard` will load `templates/format-standard.php`
- A post format of `{format video, gallery, audio, ...}` will load `templates/format-{format}.php`

### Custom Post Type templates

- The custom post type single `books` will load `templates/single-books.php`
- The custom post type single `{type}` will load `templates/single-{type}.php`

### Custom Taxonomy Archives

- The custom post type archive `{type}` will load `templates/archive-{type}.php`
- The default archive would be `archive-default.php` using the default post loop.
- Accessing `/books/sci-fi/` can use a custom loop `get_acf_part('templates/loop', 'books');`

### Custom Loops

If you have a custom post type called Books, creating `content-books.php` and loading a custom loop
like `loop-books.php` with all the necessary "Loop" code would give you a custom book loop.

See [loop-post.php](https://github.com/adampatterson/Axe/blob/master/templates/loop-post.php) for an example.

## Helper Functions

Axe uses composer to load the majority of the core helper functions, learn
more [here](https://github.com/adampatterson/Axe-Helpers).

The Axe Helpers will load a couple packages

- nesbot/carbon
- tightenco/collect
- laravel/helpers
- vlucas/phpdotenv

_Functions in the parent theme should be wrapped with `function_exists` any conflicts in the child theme._

---

`get_template_part_acf()` - Works like `get_template_part()` except that it returns a path for you to `include`. This
makes it more suitable to use with ACF. You can include your custom content once which is already done for you
thought `include(__THEME_DATA__.'/lib/data.php');`.

```php
$yourData = [];
include(get_template_part_acf('templates/partials/header'));
```

Inside **header.php** you can now access `$yourData`.

**Alternatively**

YOu can use `get_acf_part()` which internally calls `get_template_part_acf()` but does the include for you, this helps
keep your code nice
and clean.

If you wish to pass data through to your template part, you can pass it through the `data` property where it will now be
accessible through `$data`.

```php
// Standard usage, external data is not available inside 
get_acf_part('templates/content', 'blog');  
```

```php
// Passing data to  get_acf_part
$yourData = [];
get_acf_part('templates/content', 'home', data: $yourData);
```

Inside **content-home.php** you can now access `$data`.

**When to use `get_acf_part` and `get_template_part_acf`**

I like to use `get_template_part_acf` inside of the root WordPress template files like index, page, single, and archive.

Theis lets me declare my ACF or any other data once at a high level allowing it to take advantage of
PHPs [variable scope](https://www.php.net/manual/en/language.variables.scope.php).

`get_acf_part` is then used when I want more control over what's being passed to the partial. `get_acf_part` is closer
to the core functionality and implementation of `get_template_part` but does not require you to pass through data in an
`args` array.

See [data](#data) for more information on `$data` and `$blocks`.

```php
// Templates can have access to $data or $blocks
get_acf_part('templates/content', 'blog', data: $data);
get_acf_part('templates/blocks', 'heading', block: $block);
get_acf_part('templates/partials', 'something', block: $block);
```

**It's important to note that whatever property you choose to use is what will be available to your template part.**

For example, if you choose to use `$data` as your property, then your template part will have access
to `$data['title']`.

But you could also choose to use `$blocks` as your property, then your template part will have access
to `$blocks['heading']`.

And if you wanted your blocks to have access to both, then you could pass
both `get_acf_part('templates/blocks', 'heading', data: $data, block: $block);`

---

### Blocks

Blocks work a little different from `get_acf_part`. A block is meant to be an ACF Field Group that uses Flexible content
with cloned Layouts.

Where a flexible content layout using groups would give you

```php
$data["builder"] = [
    [
        "acf_fc_layout" => "heading",
        "title" => ""
    ]
];
```

Cloned content results in the content being inside another array.

For this reason, when using `get_acf_block` the fields you clone will need to use a type of **group** with the field
name of **data**.

```php
$data["builder"] = [
    [
        "acf_fc_layout" => "heading",
        "data"          => [
            "title" => ""
        ]
    ]
];
```

To save us the extra steps of loading our data from an array every time `get_acf_block` will do this for is

```php
$layout = $block['acf_fc_layout'] ?? '';
$block = $block['data'] ?? $block ?? [];
```

If cloned content isn't your thing, then feel free to use a standard block layout.

```php
$data["builder"]
  "acf_fc_layout" => "one_off"
  "title" => "One off title"
]
```

**Sample usage:**

```php
if (_has($data, 'builder', false)): // Do we have any blocks?
    foreach (_get($data, 'builder', []) as $block):
        get_acf_block($block); // Works with both standard and cloned layouts 
    endforeach;
endif;
```

And if you're not a fan of this then use `get_acf_part` as normal.

Have a look at some of the ACF fields, blocks, and a template [here](example).

---

### Path helpers

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

`show_template()` - Returns the local WordPress template path.

`get_the_logo()` - Returns an HTML link including the logo, Or just the path to the logo image.

`if_custom_logo()` - Simple function to adjust the template if there is a custom logo or not.

---

### Array Helper Functions / ACF Data helpers

`_get()` - alias for `Arr::get($haystack, $needle, $default = false)`

```php
<?= _get($block, 'title', 'Default Title') ?>
```

```php
foreach (_get($block, 'block.items', []) as $item):
    ...
endforeach;
```

`_has()` - alias for `Arr::has($haystack, $needle)`

```php
if (_has($block, 'contact.phone', false)): ?>
    ...
endif;
```

---

### Loop Methods

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

## Style

```scss
@import "components/base-variables";
@import "~bootstrap/scss/bootstrap";
```

With the addition of PurgeCSS to the build script you can safely include the entire Bootstrap library. Once a production
build has been done, any unused CSS classes will be removed.

`base-variables` holds any site specific variables that you might need including any
Bootstrap [customizations](https://getbootstrap.com/docs/5.1/customize/sass/)

# Child theme

https://github.com/adampatterson/Handle

Opening `/lib/Helpers.php` and uncommenting the function
on [line 6](https://github.com/adampatterson/Handle/blob/master/lib/Helpers.php#L6) would allow the child theme to serve
all of your themes assets.

## Recommended Plugins

**Axe will require a couple of plugins to run:**

- Advanced Custom Fields **Required**
- Custom Post Type UI
- WooCommerce
- JetPack

## To-Do's

- Create a model for ACF and other data sources
- Document a lot of the inner code such as helpers
- Document included packages
- Document the build process
- Document Child theme process using ( Handle )
- Build out a demo theme ( Blade )
- Update to Bootstrap 5
- Fix WebPack PurgeCSS

## Dummy Content for Gutenberg

Sridhar Katakam has provided an article outlining how to
add [dummy content for Gutenberg](https://sridharkatakam.com/dummy-content-for-gutenberg/).

### Example ACF fields, blocks, and a template [here](example).

### Credits

Template tags are heavily modified versions of [\_S](http://underscores.me/), Class registration was inspired
by [Alecaddd](https://github.com/Alecaddd/awps)

### Contributors:

Adam
Patterson ( [@adampatterson](http://twitter.com/adampatterson) / [adampatterson.ca](https://www.adampatterson.ca/) )

### Disclaimer

This theme reflects my own workflows and process, I have built over 100 sites using these setup and it has evolved over
time. With that said, If you have anything to add please email me at hello@adampatterson.ca

#### Local Development

    ln -s ~/Sites/cms/wordpress/wp-content/themes/Blade ./
    ln -s ~/Sites/cms/wordpress/wp-content/themes/Axe ./
    ln -s ~/Sites/cms/wordpress/wp-content/themes/Axe-Helpers ./Axe/vendor/adampatterson

### Project Setup

```shell
mkdir project-name.test
cd project-name.test
git checkout git@github.com:adampatterson/project-name.git .
wp core download
 wp core config --dbname=database_name --dbuser=root --dbpass=secret --dbhost=localhost --dbprefix=wp_ 
 wp core install --url=project-name.test --title="Your Site" --admin_user=username --admin_password=top-secret-password --admin_email=email@domain.com
```

_Note the space at the start of the commands. This will prevent the command from logging in your `history`._

In the site root run `cp .env.example .env` and then add the proper config values.

If there are `wp-config.php` constants that you need to set but are not included,
then add them to the `.env` and modify your `wp-config.php` file.

your `wp-config.php` **SHOULD** be in version control.

**From the site root:**

```shell
composer i
```

**From the theme root:**

```shell
cd wp-content/themes/name
npm i && php composer i && npm run prod
```
