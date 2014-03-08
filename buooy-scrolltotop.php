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
 * Version:           1.0.0
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
    	$element 	= 	"<div class='".$this->prefix."container'>";
    	$element 	.= 	"<img class='".$this->prefix."image' src='".$this->plugin_url."/backtotop.png'>";
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
						jQuery('.".$this->prefix."container').click(function(){
							jQuery('html,body').animate({
								scrollTop: '0px'
							},500);
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