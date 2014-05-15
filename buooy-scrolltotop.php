<?php
/**
 * Buooy Scroll To Top
 *
 * Buooy Scroll To Top is a Scroll to Top that actually looks nice. And its incredibly easy to use. Just activate and go!
 *
 * @package   Buooy_Scrolltotop
 * @author    Aaron Lee <aaron.lee@buooy.com>
 * @license   GPL-2.0+
 * @link      http://buooy
 * @copyright 2014 Buooy
 *
 * @buooy_scrolltotop
 * Plugin Name:       Buooy Scroll To Top
 * Plugin URI:        http://buooy.com
 * Description:       Buooy Scroll To Top is a Scroll to Top that actually looks nice. And its incredibly easy to use. Just activate and go!
 * Version:           1.1.0
 * Author:            Aaron Lee
 * Author URI:        http://buooy.com/
 * Text Domain:       buooy-scrolltotop-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

Class Buooy_Scrolltotop{

	protected $prefix 		= 	"stt_";
	protected $offset_top	=	"200";
	protected $plugin_url;

	// Initialise the scrolltotop
    public function __construct() {
    	$this->plugin_url = plugins_url( "", __FILE__ );

    	add_action( 'wp_head', array( $this,'wp_head_style') );
    	add_action( 'wp_footer', array( $this, 'wp_footer_script') );
        add_action( 'wp_footer', array( $this,'wp_footer_element') );
    }

    // Add Element
    public function wp_footer_element(){
		
		// Uses the default image where possible
		$back_to_top_img = $this->plugin_url."/backtotop.png";
		
		// Uses the image found in get_stylesheet_directory/backtotop/backtotop.png/jpg/jpeg/gif in that order
		$back_to_top_theme_dir = get_stylesheet_directory()."/backtotop/";
		$back_to_top_theme_uri = get_stylesheet_directory_uri()."/backtotop/";
		if( file_exists($back_to_top_theme_dir."backtotop.png") ){	$back_to_top_img = $back_to_top_theme_uri."backtotop.png";	}
		else if( file_exists($back_to_top_theme_dir."backtotop.jpg") ){	$back_to_top_img = $back_to_top_theme_uri."backtotop.jpg";	}
		else if( file_exists($back_to_top_theme_dir."backtotop.jpeg") ){	$back_to_top_img = $back_to_top_theme_uri."backtotop.jpeg";	}
		else if( file_exists($back_to_top_theme_dir."backtotop.gif") ){	$back_to_top_img = $back_to_top_theme_uri."backtotop.gif";	}
		
		// if the filter is set, then it will use the filter
		$back_to_top_img = apply_filters( 'back-to-top-image', $back_to_top_img );
	
    	$element 	= 	"<div class='".$this->prefix."container'>";
    	$element 	.= 	"<img class='".$this->prefix."image' src='".$back_to_top_img."'>";
    	$element 	.= 	"</div>";

    	echo $element;
    }

	// Add Script
	public function wp_footer_script(){
		
		$script 	= "<script>";
		$script 	.= "
						jQuery(document).scroll(function(){
							if( jQuery(document).scrollTop() > ".$this->offset_top." ){
								jQuery('.".$this->prefix."container').fadeIn();
							}
							else{
								jQuery('.".$this->prefix."container').fadeOut();
							}
						});
						jQuery(document).ready(function(){
							jQuery('.".$this->prefix."container').click(function(){
								jQuery('html,body').animate({
									scrollTop: '0px'
								},500);
							});
						});
						";
		$script 	.= "</script>";

		echo $script;

	}

	// Add Style
	public function wp_head_style(){
		$style 	= 	"<style>";
		$style 	.=	"
						.".$this->prefix."container{
							display:	none;
							opacity: 	0.75;
							position: 	fixed;
							height:		48px;
							bottom:		15px;
							right:		15px;
						}
						.".$this->prefix."container:hover{
							opacity: 	1;
							cursor:		pointer;
						}	
						.".$this->prefix."image{
							height:		48px;
						}
					";	
		$style 	.=	"</style>";
		
		echo $style;
	}

}

$buooy_scrolltotop = new Buooy_Scrolltotop;