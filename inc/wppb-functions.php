<?php
/**
 * WPPB
 *
 * Functions
 *
 * @author   Fabio Gonzaga
 * @since    1.0
 */
if ( ! defined( 'ABSPATH' ) ) 
{
	exit; // Exit if accessed directly.
}

// Call wppb_plugin_menu function to load plugin menu in dashboard
add_action( 'admin_menu', 'wppb_plugin_menu' );

/**
* Register plugin menu
*/
    if( !function_exists("wppb_plugin_menu") )
    {
        function wppb_plugin_menu()
        {
            $page_title = 'Plugin Base';
            $menu_title = 'Plugin Base';
            $capability = 'manage_options';
            $menu_slug  = 'wppb-plugin';
            $function   = 'wppb_plugin_page';
            $icon_url   = 'dashicons-welcome-widgets-menus';
            $position   = 20;

            add_menu_page( 
                $page_title,
                $menu_title,
                $capability,
                $menu_slug,
                $function,
                $icon_url,
                $position 
            );

            // Call wppb_update_settings function to update database
            add_action( 'admin_init', 'wppb_update_settings' );
        }
    }

/**
* Create function to register plugin settings in the database
*/
    if( !function_exists("wppb_update_settings") )
    {
        function wppb_update_settings() 
        {
            register_setting( 'wppb-plugin-settings', 'wppb_field_test_1' );
            // Other fields ... 
            // register_setting( 'wppb-plugin-settings', 'wppb_field_test_2' );
        }
    }

/**
* Create Plugin Page
*/
    if ( ! function_exists('wppb_plugin_page') ) 
    {
        function wppb_plugin_page()
        {
            include WPPB_PATH . 'templates/wppb-dashboard.php';
        }
    }

/**
* Geo IP
*/
    function getLocationInfoByIp()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = @$_SERVER['REMOTE_ADDR'];
        $result  = array('country'=>'', 'city'=>'');
        if(filter_var($client, FILTER_VALIDATE_IP)){
            $ip = $client;
        }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
            $ip = $forward;
        }else{
            $ip = $remote;
        }
        $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
        if($ip_data && $ip_data->geoplugin_countryName != null){
            $result['country'] = $ip_data->geoplugin_countryCode;
            $result['city'] = $ip_data->geoplugin_city;
        }
        return $result;
    }
