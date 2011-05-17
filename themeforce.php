<?php

/*
 * Theme Force Framework
 *
 * Version: dev
 */
 
define( 'TF_PATH', dirname( __FILE__ ) );
define( 'TF_URL', str_replace( ABSPATH, get_bloginfo('url') . '/', TF_PATH ) );

//Food Menu
if( current_theme_supports( 'tf_food_menu' ) )
	require_once( TF_PATH . '/food-menu/tf.food-menu.php' );

//Events
if( current_theme_supports( 'tf_events' ) )
	require_once( TF_PATH . '/events/tf.events.php' );

//Widgets
require_once( TF_PATH . '/widgets/newsletter-widget.php' );

if( current_theme_supports( 'tf_widget_opening_times' ) )
	require_once( TF_PATH . '/widgets/widget-openingtimes.php' );

if( current_theme_supports( 'tf_widget_google_maps' ) )
	require_once( TF_PATH . '/widgets/widget-googlemaps.php' );

//Google Maps
require_once( TF_PATH . '/tf.googlemaps.shortcodes.php' );

//Four Square
if( current_theme_supports( 'tf_four_square' ) ) {
	require_once( TF_PATH . '/foursquare/tf.foursquare.php' ); 
	require_once( TF_PATH . '/widgets/widget-foursquare-photos.php' );
	require_once( TF_PATH . '/widgets/widget-foursquare-tips.php' );
}

//Yelp
if( current_theme_supports( 'tf_yelp' ) ) {
	require_once( TF_PATH . '/yelp/tf.yelp.php' );
}

//Options Framework
define('OF_FILEPATH', STYLESHEETPATH );
define('OF_DIRECTORY', TF_URL . '/options-framework' );

require_once( TF_PATH . '/options-framework/admin/admin-options.php' );
require_once( TF_PATH . '/options-framework/admin/admin-functions.php');		// Custom functions and plugins
require_once( TF_PATH . '/options-framework/admin/admin-interface.php');		// Admin Interfaces (options,framework, seo)

/**
 * Enqueue the admin styles for themeforce features.
 * 
 */
function tf_enqueue_admin_css() {
	wp_enqueue_style('tf-functions-css', TF_URL . '/assets/css/admin.css');
}
add_action('admin_init', 'tf_enqueue_admin_css');

/**
 * Adds the themeforce icon to the ThemeForce related widget in the admin.
 * 
 */
function tf_add_tf_icon_classes_to_widgets() {
	?>
	 <script type="text/javascript">
     	jQuery( document ).ready( function() {
     		
     		jQuery( '.widget' ).filter( function( i, object ) {
     			if( jQuery( this ).attr('id').indexOf( '_tf' ) > 1 )
					jQuery( object ).addClass('tf-admin-widget');
     		} );
     		
     	} );
     </script>
     
     <style text="text/css">
     	/* ThemeForce Icon */
		.tf-admin-widget .widget-top { background-image: url(<?php echo TF_URL ?>/assets/images/ui/icon-themeforce-18.png); background-repeat: no-repeat; background-position: 213px center; }
     </style>
	<?php
}
add_action( 'in_admin_footer', 'tf_add_tf_icon_classes_to_widgets' );