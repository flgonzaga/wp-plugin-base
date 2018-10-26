<?php
/*
* Plugin Name: Plugin Base (WPPB)
* Plugin URI: 
* Description: This is a Tool Kit Base to start any development in Wordpress
* Author: Fabio Gonzaga
* Author URI: http://gist.github.com/flgonzaga
* Version: 1.0
*/

if ( ! defined( 'ABSPATH' ) ) 
{
	exit; // Exit if accessed directly.
}

define( 'WPPB_PATH', plugin_dir_path( __FILE__ ) );

require_once 'inc/rbc-functions.php';