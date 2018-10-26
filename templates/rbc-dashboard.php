<?php
/**
 * RBC
 *
 * Dashboard Template
 *
 * @author   Fabio Gonzaga
 * @package wp-base-starter
 * @since    1.0
 */
if ( ! defined( 'ABSPATH' ) ) 
{
	exit; // Exit if accessed directly.
}


/** WordPress Administration Bootstrap */
require_once( ABSPATH . 'wp-load.php' );
require_once( ABSPATH . 'wp-admin/admin.php' );
require_once( ABSPATH . 'wp-admin/admin-header.php' );
?>
<div class="wrap about-wrap">
	<h1><?php _e( 'Replace By Country Plugin' ); ?></h1>

	<!-- <div class="about-text"></div> -->

	<h2 class="nav-tab-wrapper">
		<a href="#" class="nav-tab nav-tab-active"><?php _e( 'Settings' ); ?></a>
	</h2>

	<div class="changelog">
		<h3><?php _e( 'Settings Page' ); ?></h3>
        <div class="feature-section images-stagger-right">
            <form method="post" action="options.php">
                <?php settings_fields( 'rbc-plugin-settings' ); ?>
                <?php do_settings_sections( 'rbc-plugin-settings' ); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Field test:</th>
                        <td><input type="text" name="rbc_field_test" value="<?php echo get_option('rbc_field_test_1'); ?>"/></td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div><!-- /.feature-section -->
	</div><!-- /.changelog -->
</div><!-- /.wrap -->
<?php include( ABSPATH . 'wp-admin/admin-footer.php' );