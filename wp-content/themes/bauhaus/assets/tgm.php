<?php
require_once get_template_directory() . '/assets/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'bauhaus_my_theme_register_required_plugins2' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function bauhaus_my_theme_register_required_plugins2() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.

		array(
			'name' => 'Visual composer',
			'slug' => 'js_composer',
			'required' => true,
			'source' => get_template_directory() . "/plugins/js_composer.zip"
		),
		array(
			'name' => 'Revolution Slider',
			'slug' => 'revslider',
			'source' => get_template_directory() . "/plugins/revslider.zip", // The plugin source.
			'required' => true, // If false, the plugin is only 'recommended' instead of required.

		),
		array(
			'name' => 'Comet Cache (speedup)',
			'slug' => 'comet-cache',
			'required' => false,
		),
		array(
			'name' => 'GTranslate',
			'slug' => 'gtranslate',
			'required' => false,
		),
		array(
			'name' => 'OptionTree',
			'slug' => 'option-tree',
			'required' => true,

		),

		array(
			'name' => 'Contact form 7',
			'slug' => 'contact-form-7',
			'required' => true,

		),
		array(
			'name' => 'WP User Avatar',
			'slug' => 'wp-user-avatars',
			'required' => true,

		),

		array(
			'name' => 'Bauhaus plugin',
			'slug' => 'bauhaus_plugin',
			'version' => '1.0.6',
			'required' => true,
			'source' => get_template_directory() . "/plugins/bauhaus_plugin.zip"
		),


	);
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'parent_slug' => 'themes.php',
		'default_path' => '', // Default absolute path to pre-packaged plugins.
		'menu' => 'tgmpa-install-plugins', // Menu slug.
		'has_notices' => true, // Show admin notices or not.
		'dismissable' => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true, // Automatically activate plugins after installation or not.
		'message' => '', // Message to output right before the plugins table.
		'strings' => array(
			'page_title' => esc_html__( 'Install Required Plugins', "bauhaus" ),
			'menu_title' => esc_html__( 'Install Plugins', "bauhaus" ),
			'installing' => esc_html__( 'Installing Plugin: %s', "bauhaus" ),
			// %s = plugin name.
			'oops' => esc_html__( 'Something went wrong with the plugin API.', "bauhaus" ),
			'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.', "bauhaus" ),
			// %1$s = plugin name(s).
			'notice_can_install_recommended' => _n_noop( 'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.', "bauhaus" ),
			// %1$s = plugin name(s).
			'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.',
				'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', "bauhaus" ),
			// %1$s = plugin name(s).
			'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.', "bauhaus" ),
			// %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.', "bauhaus" ),
			// %1$s = plugin name(s).
			'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.',
				'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', "bauhaus" ),
			// %1$s = plugin name(s).
			'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', "bauhaus" ),
			// %1$s = plugin name(s).
			'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.',
				'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', "bauhaus" ),
			// %1$s = plugin name(s).
			'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins', "bauhaus" ),
			'activate_link' => _n_noop( 'Begin activating plugin', 'Begin activating plugins', "bauhaus" ),
			'return' => esc_html__( 'Return to Required Plugins Installer', 'bauhaus' ),
			'plugin_activated' => esc_html__( 'Plugin activated successfully.', 'bauhaus' ),
			'complete' => esc_html__( 'All plugins installed and activated successfully. %s', 'bauhaus' ),
			// %s = dashboard link.
			'nag_type' => 'updated'
			// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}


