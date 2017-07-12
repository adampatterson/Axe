Axe
==

Axe is a simple bare bones WordPress starter structure. It is a theme meant to be a starting point to get you setup and running as fast as possible.

My build workflow might not be very orthodox but I typically review the design, Setup my Custom post types using [Custom Post Type UI](https://en-ca.wordpress.org/plugins/custom-post-type-ui/) and setup any page data structures using [ACF](http://www.advancedcustomfields.com/).

Simply being able to plow ahead creating my site structures and loading in real or fake content lets me have something tangible to work with.

Another tip that I can provide is using `console.log` to output my ACF structures reducing the need to be to refer back to the admin pages. Check it out [here](https://gist.github.com/adampatterson/711a101d5d93f3226fe1).

### Build
Included is a blower file preset with Bootstrap SASS, jQuery and a couple other commonly used packages. Bower is going to download packages to `/src/vendor`. 

The [src folder](https://github.com/adampatterson/Axe/tree/master/src) stores your SASS and JS that should be compiled into `/assets`.

Use whatever build tool you want. A CodeKit file has been included to get up and running FAST. Gulp and Grunt are fine but do you really need it?

###Page templates
Placing a file under `templates/content-home.php` will resolve the home page. Using `content-contact.php` would be used by `/contact`

### Post format templates
Placing a file under `templates/format-video.php` will resolve all video formats.

### Custom Post Type templates
Placing a file under `templates/single-books.php` will resolve all custom post type single posts.

### Custom Taxonomies
Placing a file under `templates/archive-books.php` will resolve a custom taxonomy for Books `/books/schi-fi/` also using a custom loop. The default archive would be `archive-default.php` using the default post loop.

### Custom Loops
If you have a custom post type called Books, creating `content-books.php` and loading a custom loop like `loop-books.php` with all the necessary "Loop" code would give you your custom book loop.

See [loop-post.php](https://github.com/adampatterson/Axe/blob/master/templates/loop-post.php) for an example.

### Style
```
@import "components/base-variables";
@import "components/bootstrap-variables";
@import "components/bootstrap-custom";
```
Since loading Bootstrap from the vendor folder means you can't modify your variables without risk over overwriting them, A copy has been made in the `/src` folder. 

`base-variables` houses any site specific variables that you might need. 

`bootstrap-custom` allows you to easily comment out any unused Bootstrap code that you wont be using. This lets you output a more minimal css file.

### Child theme
https://github.com/adampatterson/Handle

### Credits
Template tags are modified versions of [_S](http://underscores.me/)

#### Disclaimer
 This theme is made for Me, and with my efficiencies in mind. That said, If you have anyhting to add then send me an email hello@adampatterson.ca
