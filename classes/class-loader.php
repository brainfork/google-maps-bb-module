<?php
/**
 * A class that handles loading custom modules and custom fields if the builder is
 * installed and activated.
 *
 * PHP Version 7.3
 *
 * @category WordPress-plugin
 * @package  FpBbModules
 * @author   Kaleb J. Barker <messagekaleb@gmail.com>
 * @license  GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://bitbucket.org/brainfork/google-maps-bb-module/
 */

/**
 * The loader class
 *
 * @category Class
 * @package  FpBbModules
 * @author   Kaleb J. Barker <messagekaleb@gmail.com>
 * @license  GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://bitbucket.org/brainfork/google-maps-bb-module/
 */
class FP_BB_Modules_Loader
{
    /**
     * Initializes the class once all plugins have loaded.
     *
     * @return void
     */
    public static function init()
    {
        add_action('plugins_loaded', __CLASS__ . '::setupHooks');
    }
    
    /**
     * Setup hooks if the builder is installed and activated.
     *
     * @return void
     */
    public static function setupHooks()
    {
        if (! class_exists('FLBuilder')) {
            return;
        }
        
        // Load custom modules.
        add_action('init', __CLASS__ . '::loadModules');
    }
    
    /**
     * Loads our custom modules.
     * 
     * @return void
     */
    public static function loadModules()
    {
        include_once FP_BB_MODULES_DIR . 'modules/google-map/google-map.php';
    }
}

FP_BB_Modules_Loader::init();
