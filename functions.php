<?php
/**
 * Functions
 *
 * @package      BlueEel
 * @author       Josh Tintner &lt;Joshuatintner@gmail.com&gt;
 * @copyright    Copyright (c) 2031, Josh Tintner
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
 */

/**
 * Theme Setup
 *
 * This setup function attaches all of the site-wide functions 
 * to the correct actions and filters. All the functions themselves
 * are defined below this setup function.
 *
 */



add_action('genesis_setup','child_theme_setup', 15);
function child_theme_setup() {

  // Add Nav to Header
	add_action('genesis_before_header', 'be_nav_menus','genesis_header' ,'genesis_after_header' ,'be_nav_menues_seconday' );

}

/**
 * Add Nav Menus to Header
 *
 */

function be_nav_menus() {
	echo '<div class="menus"><div class="menu-primary">';
	wp_nav_menu( array( 'menu' => 'Primary' ) );
	echo '</div><!-- .primary --></div><!--.menus -->';
}
genesis_register_sidebar( array(
'id' => 'custom-widget',
'name' => __( 'Home Columns', 'wpsites' ),
'description' =>  __( 'Adds Home Page Widget For 3 Columns', 'wpsites' ),
) );
/**
* @author Brad Dalton - WP Sites
* @learn more http://wp.me/p1lTu0-a0y
*/
add_action( 'genesis_before_content_sidebar_wrap', 'wpsites_home_widget', 5 );
function wpsites_home_widget() {
if ( is_home() && is_active_sidebar( 'custom-widget' ) ) {
    echo '<div class="custom-widget">';
	dynamic_sidebar( 'custom-widget' );
	echo '</div><!-- end .custom-widget -->';
 
  }
	
}
