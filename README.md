Ax
==

Ax is a simple bare bones WordPress starter structure. It is a theme ment to be a starting point to get you setup and running as fast as possible.

My build workflow might not be very orthidox but I typicall review the design, Setup my Custom post types using (Custom Post Type UI)[https://en-ca.wordpress.org/plugins/custom-post-type-ui/] and setup any page data structures using (ACF)[http://www.advancedcustomfields.com/].

Simply being able to plow ahead creating my site structures and loading in real or fake content lets me have something tangable to work with.

Another tip that I can provbide is using `console.log` to output my ACF structures reducing the need to be to refer back to the admin pages. Check it out (here)[https://gist.github.com/adampatterson/711a101d5d93f3226fe1].

###Page tempaltes
Placing a file under `templates/content-home.php` will resolve the home page. Using `content-contact.php` would be used by `/contact`

###Post format tempaltes
Placing a file under `templates/format-video.php` will resolve all video formats.

###Custom Post Type templates
Placing a file under `templates/single-books.php` will resolve all custom post type single posts.

###Custom Taxonomies
Placing a file under `templates/archive-books.php` will resolve a custom taxonomie for Books `/books/schi-fi/` alos using a custom loop. The default archive would be `archive-default.php` using the default post loop.

### Custom Loops
If you have a custom post type called Books, creating `content-books.php` and loading a custom loop like `loop-books.php` with all the nessesary "Loop" code would give you your custom book loop.

See (loop-post.php)[https://github.com/adampatterson/Ax/blob/master/templates/loop-post.php] for an example.
