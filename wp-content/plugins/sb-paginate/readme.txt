=== Pagination by HocWP Team ===
Contributors: skylarkcob, hocwp, sauhi
Donate link: http://hocwp.net/donate/
Tags: paginate, pagination, hocwp plugin, hocwp pagination, wp pagination, pagination plugin
Requires at least: 4.7
Tested up to: 4.8
Stable tag: 2.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Pagination by HocWP Team is a pagination plugin that allows to set up navigation on WordPress site.

== Description ==

Pagination by HocWP Team is a pagination plugin that allows to set up navigation on WordPress site. Pagination by HocWP Team not only supports the default query but also it can be used to show navigation for the custom query on WordPress.

**Features**

* Add the pagination on your WordPress site.
* Show pagination for the custom query.

**Translations**

* English
* Vietnamese

== Installation ==

Install this plugin from your WordPress site Dashboard or follow these steps below:

1. Download plugin from WordPress Plugins directory and extract it.
1. Upload the `sb-paginate` folder to the `/wp-content/plugins/` directory.
1. Activate the Pagination by HocWP Team plugin through the 'Plugins' menu in WordPress.
1. Configure the plugin by going to the `Settings → Pagination` menu that appears in your admin menu.

Examples:

For the default query:
	
	<?php if(function_exists("hocwp_pagination")) hocwp_pagination(); ?>
	
For the custom query usage with arguments:
	
	<?php $query = new WP_Query(array("posts_per_page" => 1, "paged" => ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1)); ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; wp_reset_postdata(); ?>
	<?php if(function_exists("hocwp_pagination")) hocwp_pagination(array("query" => $query)); ?>
	
For basic usage, you can also have a look at the [plugin homepage](http://hocwp.net/).

== Frequently Asked Questions ==

Please visit [www.hocwp.net](http://hocwp.net) for more details.

= Where is the settings page for Pagination by HocWP Team? =

Go to Settings → Pagination and change the value for customizing pagination.

== Screenshots ==
1. Pagination with default style.
2. Options page for customizing pagination.

== Upgrade Notice ==

== Changelog ==
= 2.0.1 =
* Add function for displaying dynamic sizes.

= 2.0.0 =
* Update all code, change to new pagination style.
* Change name to Pagination by HocWP Team.

= 1.1.3 =
* Try to change SB Paginate plugin name to Pagination by HocWP

= 1.1.1 =
* Stop using SB Plugins if current theme doesn't support.

= 1.1.0 =
* Update testing filter.
* Re-struct SB Paginate.

= 1.0.9 =
* Tested up to WordPress 4.1 version.

= 1.0.8 =
* Make Vietnamese as the default language.

= 1.0.7 =
* Update new check core functions.

= 1.0.6 =
* Update check core function.

= 1.0.5 =
* Update new check core functions.

= 1.0.4 =
* New: Add option for user change pagination label.

= 1.0.3 =
* Fix: Missing committed files.

= 1.0.2 =
* Update: Compress css and javascript.
* Fix: Plugin settings link bugs.

= 1.0.1 =
* New: Add SB Options page to the Dashboard menu.
* New: Now you can set option for pagination to show.

= 1.0.0 =
* First release of SB Paginate.

== Updates ==
Updates to the plugin will be posted on [www.hocwp.net](https://hocwp.net/) and the [Pagination by HocWP Team homepage](https://wordpress.org/plugins/sb-paginate/) will always link to the newest version.