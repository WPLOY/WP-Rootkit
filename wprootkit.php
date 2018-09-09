<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.wprootkit.com
 * @since             1.0.0
 * @package           WPRootKit
 *
 * @wordpress-plugin
 * Plugin Name:       WP Rootkit
 * Plugin URI:        https://www.wprootkit.com
 * Description:       A plugin that installs a generic payload for managing a WordPress installation via backdoor. This is not for nefarious purposes.
 * Version:           1.0.0
 * Author:            WPLOY, Jamie Bowman
 * Author URI:        https://www.wploy.com/wp-rootkit
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       WPRootKit
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wprootkit-activator.php
 */
function activate_WPRootKit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wprootkit-activator.php';
	WPRootKit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wprootkit-deactivator.php
 */
function deactivate_WPRootKit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wprootkit-deactivator.php';
	WPRootKit_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wprootkit' );
register_deactivation_hook( __FILE__, 'deactivate_wprootkit' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wprootkit.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wprootkit() {

	$plugin = new WPRootKit();
	$plugin->run();

}
run_wprootkit();
