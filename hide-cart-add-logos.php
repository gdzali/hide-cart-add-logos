<?php
/**
* Hide Cart Add Logos
*
* @package HIDECARTLOGO
* @author AliG
* @license gplv2-or-later
* @version 1.0.0
*
* @wordpress-plugin
* Plugin Name: Hide Cart Add Logos
* Plugin URI: https://aliguduz.com
* Version: 1.0.0
* Author: Ali G.
* Author URI: https://aliguduz.com
* Text Domain: hide-cart-add-logos

*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'PREFIX_VERSION_NUM' ) ) 		define( 'PREFIX_VERSION_NUM'		, '1.0' ); // Plugin version constant
if ( ! defined( 'PREFIX_HIDECARTLOGO_PLUGIN' ) )		define( 'PREFIX_HIDECARTLOGO_PLUGIN'		, trim( dirname( plugin_basename( __FILE__ ) ), '/' ) ); // Name of the plugin folder eg - 'starter-plugin'
if ( ! defined( 'PREFIX_HIDECARTLOGO_PLUGIN_DIR' ) )	define( 'PREFIX_HIDECARTLOGO_PLUGIN_DIR'	, plugin_dir_path( __FILE__ ) ); // Plugin directory absolute path with the trailing slash. Useful for using with includes eg - /var/www/html/wp-content/plugins/starter-plugin/
if ( ! defined( 'PREFIX_HIDECARTLOGO_PLUGIN_URL' ) )	define( 'PREFIX_HIDECARTLOGO_PLUGIN_URL'	, plugin_dir_url( __FILE__ ) ); // URL to the plugin folder with the trailing slash. Useful for referencing src eg - http://localhost/wp/wp-content/plugins/starter-plugin/

define( 'MY_ACF_PATH', PREFIX_HIDECARTLOGO_PLUGIN_DIR . 'includes/acf-pro/' );
define( 'MY_ACF_URL', PREFIX_HIDECARTLOGO_PLUGIN_DIR . 'includes/acf-pro/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

include_once(PREFIX_HIDECARTLOGO_PLUGIN_DIR . 'includes/custom-fields.php');

function add_style() {
	wp_enqueue_style( 'hide-cart-add-logos-style', PREFIX_HIDECARTLOGO_PLUGIN_URL . 'includes/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'add_style' );

//add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
/*function my_acf_settings_show_admin( $show_admin ) {
    return false;
}*/

add_action( 'wp', 'rudr_remove_add_to_cart_single_product' );

function rudr_remove_add_to_cart_single_product(){
	if( is_product() ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}
}

function add_logos( $post_excerpt )   {
    echo $post_excerpt;
    include(PREFIX_HIDECARTLOGO_PLUGIN_DIR . 'includes/logo-area.php');
};
// add the filter
add_filter( 'woocommerce_short_description','add_logos',10, 1 );


add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function remove_add_to_cart_buttons() {
  if( is_product_category() || is_shop()) {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
  }
}

function add_eticaret_incele() {
  include(PREFIX_HIDECARTLOGO_PLUGIN_DIR . 'includes/eticaret-ve-incele.php');
}

add_action('woocommerce_after_shop_loop_item', 'add_eticaret_incele');