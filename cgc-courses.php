<?php
/**
 *
 * @package   CGC Courses
 * @author    Nick Haskins <nick@cgcookie.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Your Name or Company Name
 *
 * Plugin Name:       CGC Courses
 * Plugin URI:        http://cgcookie.com
 * Description:       Creates a course system with chapters and lessons
 * Version:           2.0
 * GitHub Plugin URI: https://github.com/cgcookie/cgc-courses
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Set some constants
define('CGC_COURSES_VERSION', '2.0');
define('CGC_COURSES_DIR', plugin_dir_path( __FILE__ ));
define('CGC_COURSES_URL', plugins_url( '', __FILE__ ));

require_once( plugin_dir_path( __FILE__ ) . 'public/class-cgc-courses.php' );

register_activation_hook( __FILE__, array( 'CGC_Courses', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'CGC_Courses', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'CGC_Courses', 'get_instance' ) );

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-cgc-courses-admin.php' );
	add_action( 'plugins_loaded', array( 'CGC_Courses_Admin', 'get_instance' ) );

}
