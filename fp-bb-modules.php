<?php
/**
 * Plugin Name: Beaver Builder Custom Google Maps Module
 * Plugin URI: https://bitbucket.org/brainfork/google-maps-bb-module/
 * Description: Custom modules for the Beaver Builder Plugin.
 * Version: 1.0
 * Author: Kaleb J. Barker
 * Author URI: https://kaleb.codes
 * 
 * PHP Version 7.3
 * 
 * @category WordPress-plugin
 * @package  FpBbModules
 * @author   Kaleb J. Barker <messagekaleb@gmail.com>
 * @license  GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://bitbucket.org/brainfork/google-maps-bb-module/
 */
define('FP_BB_MODULES_DIR', plugin_dir_path(__FILE__));
define('FP_BB_MODULES_URL', plugins_url('/', __FILE__));

require_once FP_BB_MODULES_DIR . 'classes/class-loader.php';
