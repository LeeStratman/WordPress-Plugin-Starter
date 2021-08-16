<?php
/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Your Name
 * @copyright         2021 Your Name or Company Name
 * @license           GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Name
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.6
 * Requires PHP:      7.2
 * Author:            Your Name
 * Author URI:        https://example.com
 * Text Domain:       plugin-slug
 * License:           GPL v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'SAMPLE_PLUGIN_FILE' ) ) {
	define( 'SAMPLE_PLUGIN_FILE', __FILE__ );
}

if ( ! class_exists( 'Sample_Plugin', false ) ) {
	include_once dirname( 'SAMPLE_PLUGIN_FILE' ) . '/includes/class-sample-plugin.php';
}
