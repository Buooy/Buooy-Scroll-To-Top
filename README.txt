=== Buooy Scroll To Top ===
Contributors: Buooy
Requires at least: 3.8.1
Tested up to: 3.9.1
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Buooy Scroll To Top is a Scroll to Top that actually looks nice. And its incredibly easy to use. Just activate and go!

== Description ==

Buooy Scroll To Top is a Scroll to Top that actually looks nice. And its incredibly easy to use. Just activate and go!

= Usage =

**Simple**

Nothing! Just activate and go! It will automatically create a nice back to top button that will appear after your user scrolls beyond 200px.

**Advanced**

There are a few ways to use your own image:

1. Method 1: Create a directory with the EXACT directory name of 'backtotop' in your theme root directory and place an image with the EXACT file name of 'backtotop.png' or 'backtotop.jpg' or 'backtotop.jpeg' or 'backtotop.gif'. If you have multiple image files, the image will load in that order.
2. Method 2: Use the filter 'back-to-top-image' as follows in your theme's functions.php:

    if(has_filter('back-to-top-image')){
	
        add_filter( 'back-to-top-image', 'add_back_to_top_image' );
		
	}
	
	function add_back_to_top_image(){
	
		return URL_TO_THE_IMAGE_HERE;
		
	}

== Installation ==

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `buooy-scrolltotop.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `buooy-scrolltotop.zip`
2. Extract the `buooy-scrolltotop` directory to your computer
3. Upload the `buooy-scrolltotop` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard


== Frequently Asked Questions ==

= I would post a question, but no one has asked! =

== Changelog ==

= 1.1.0 =
* Added features to allow a change in the scroll to top image

= 1.0.2 =
* Fixed bug in 1.0.1

= 1.0.1 =
* Updated the elements to be within the wp_footer hook

= 1.0 =
* First Upload
