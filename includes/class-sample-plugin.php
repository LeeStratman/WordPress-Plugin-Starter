<?php
/**
 * Sample Plugin setup.
 *
 * @package PluginPackage
 */

defined( 'ABSPATH' ) || exit;

/**
 * Main Sample Plugin Class.
 *
 * @class Sample_Plugin
 */
final class Sample_Plugin {

	/**
	 * Sample Plugin version.
	 *
	 * @var string
	 */
	public $version = '0.1.0';

	/**
	 * The single instance of the class.
	 *
	 * @var Sample_Plugin
	 */
	protected static $_instance = null;

	/**
	 * Main Sample Plugin Instance.
	 *
	 * Ensures only one instance of Sample_Plugin is loaded or can be loaded.
	 *
	 * @static
	 * @return Sample_Plugin - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}
