<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
Plugin Name: OXSN Disable Admin Bar
Plugin URI: https://wordpress.org/plugins/oxsn-disable-admin-bar/
Description: This plugin adds helpful admin bar disabling!
Author: oxsn
Author URI: https://oxsn.com/
Version: 0.0.3
*/


define( 'oxsn_disable_admin_bar_plugin_basename', plugin_basename( __FILE__ ) );
define( 'oxsn_disable_admin_bar_plugin_dir_path', plugin_dir_path( __FILE__ ) );
define( 'oxsn_disable_admin_bar_plugin_dir_url', plugin_dir_url( __FILE__ ) );

if ( ! function_exists ( 'oxsn_disable_admin_bar_settings_link' ) ) {

	add_filter( 'plugin_action_links', 'oxsn_disable_admin_bar_settings_link', 10, 2 );
	function oxsn_disable_admin_bar_settings_link( $links, $file ) {

		if ( $file != oxsn_disable_admin_bar_plugin_basename )
		return $links;
		$settings_page = '<a href="' . menu_page_url( 'oxsn-disable-admin-bar', false ) . '">' . esc_html( __( 'Settings', 'oxsn-disable-admin-bar' ) ) . '</a>';
		array_unshift( $links, $settings_page );
		return $links;

	}

}


?><?php


/* OXSN Dashboard Tab */

if ( !function_exists('oxsn_dashboard_tab_nav_item') ) {

	add_action('admin_menu', 'oxsn_dashboard_tab_nav_item');
	function oxsn_dashboard_tab_nav_item() {

		add_menu_page('OXSN', 'OXSN', 'manage_options', 'oxsn-dashboard', 'oxsn_dashboard_tab' );

	}

}

if ( !function_exists('oxsn_dashboard_tab') ) {

	function oxsn_dashboard_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap">
		
			<h2>OXSN / Digital Agency</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Coming Soon</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Plugin Tab */

if ( ! function_exists ( 'oxsn_disable_admin_bar_plugin_tab_nav_item' ) ) {

	add_action('admin_menu', 'oxsn_disable_admin_bar_plugin_tab_nav_item', 99);
	function oxsn_disable_admin_bar_plugin_tab_nav_item() {

		add_submenu_page('oxsn-dashboard', 'OXSN Disable Admin Bar', 'Disable Admin Bar', 'manage_options', 'oxsn-disable-admin-bar', 'oxsn_disable_admin_bar_plugin_tab');

	}

}

if ( !function_exists('oxsn_disable_admin_bar_plugin_tab') ) {

	function oxsn_disable_admin_bar_plugin_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap oxsn_settings_page">
		
			<h2>OXSN / Disable Admin Bar Plugin</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p>Coming soon.</p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Custom Project</h3>

							<div class="inside">

								<p>Want us to build you a custom project?</p>

								<p><a href="mailto:brief@oxsn.com?Subject=Custom%20Project%20Request%21&Body=Please%20answer%20the%20following%20questions%20to%20help%20us%20better%20understand%20your%20needs..%0A%0A1.%20What%20is%20the%20name%20of%20your%20company%3F%0A%0A2.%20What%20are%20the%20concepts%20and%20goals%20of%20your%20project%3F%0A%0A3.%20What%20is%20the%20proposed%20budget%20of%20this%20project%3F" class="button button-primary button-large">Email Us</a></p>

							</div>
							
						</div>

						<div class="postbox">

							<h3 class="hndle cursor_initial">Support</h3>

							<div class="inside">

								<p>Need help with this plugin? Visit the Wordpress plugin page for support..</p>

								<p><a href="https://wordpress.org/support/plugin/oxsn-disable-admin-bar" target="_blank" class="button button-primary button-large">Support</a></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Disable Admin Bar */

if ( ! function_exists ( 'oxsn_disable_admin_bar' ) ) {

	add_action('after_setup_theme', 'oxsn_disable_admin_bar');
	function oxsn_disable_admin_bar() {

		if (!current_user_can('manage_options') && !is_admin()) {
			show_admin_bar(false);
		}

	}

}


?>