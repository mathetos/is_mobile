<?php
/*
	Plugin Name: Is Mobile Shortcode
	Plugin URI: http://mattcromwell.com/is-mobile-shortcode
	Description: A simple shortcode to swap content in your pages/posts if the user is on a mobile device.
	Author: webdevmattcrom
	Version: 0.9
	Author URI: http://profiles.wordpress.org/webdevmattcrom/
	Text Domain: ismobile
 */
//definitions
define( 'ISMOB_PATH', plugin_dir_path( __FILE__ ));
define( 'ISMOB_URL', plugins_url( '/' , __FILE__ ));

//
// Mobile/Desktop Shortcodes
//

function is_mobile( $atts , $content = null ) {
wp_enqueue_script( 'ismobile' );
ob_start(); 
extract( shortcode_atts( array(
      'device' => 'any',
      ), $atts ) );
?>
<script>
			$(function(){isMobile.toggle(isMobile.<?php echo $device; ?>); });
</script>
<div class="is-mobile"> 
<?php echo $content; ?>
</div>
<?php
return ob_get_clean();
}
add_shortcode( 'is-mobile', 'is_mobile' );

function is_desktop( $atts , $content = null ) {
//wp_enqueue_script( 'ismobile' );
ob_start(); 
?>
<div class="is-desktop"> 
<?php echo $content; ?>
</div>
<?php
return ob_get_clean();
}
add_shortcode( 'is-desktop', 'is_desktop' );

/*
 * Register FooTrigger
 * The Shortcode Enqueues it
 */

add_action( 'wp_enqueue_scripts', 'register_ismobile' );

function register_ismobile() {
	wp_register_script('ismobile', plugins_url('ismobile.js', __FILE__), array('jquery'), '1.0', false);
}
