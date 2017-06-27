<?php
/*
Plugin Name: MG Sponsors
Plugin URI:  https://github.com/maugelves/mg-wp-sponsors
Description: Add Sponsors to your WordPress website with name, image and link to their websites
Version:     1.0
Author:      Mauricio Gelves
Author URI:  https://maugelves.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mgspp
Domain Path: /languages
*/

// CONSTANTS
define( 'MGSP_PATH', dirname( __FILE__ ) );
define( 'MGSP_FOLDER', basename( MGSP_PATH ) );
define( 'MGSP_URL', plugins_url() . '/' . MGSP_FOLDER );


/*
*   =================================================================================================
*   BASE CLASS
*   =================================================================================================
*/
include ( MGSP_PATH . "/inc/base.php" );



/*
*   =================================================================================================
*   PLUGIN DEPENDENCIES
*   =================================================================================================
*/
include ( MGSP_PATH . "/inc/libs/class-tgm-plugin-activation.php" );
add_action( 'tgmpa_register', array( 'MGSP_Base', 'check_plugin_dependencies' ) );



/*
*   =================================================================================================
*   CUSTOM POST TYPES
*   Include all the Custom Post Types you need in the 'includes/cpts/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(__DIR__ . "/inc/cpts/*.php") as $filename)
	include $filename;




/*
*   =================================================================================================
*   ADVANCED CUSTOM FIELDS
*   Include all the Advanced Custom Fields you need in the 'includes/acfs/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(__DIR__ . "/inc/acfs/*.php") as $filename)
	include $filename;