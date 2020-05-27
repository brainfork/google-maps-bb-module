<?php
/**
 * A module that adds a Google Map with pins
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
 * The module class
 *
 * @category Class
 * @package  FpBbModules
 * @author   Kaleb J. Barker <messagekaleb@gmail.com>
 * @license  GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://bitbucket.org/brainfork/google-maps-bb-module/
 */
class FpBbGoogleMap extends FLBuilderModule
{
    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(
            array(
                'name' => 'Google Map',
                'description' => 'Google Map with pins.',
                'category' => 'Example Modules',
                'dir' => FP_BB_MODULES_DIR . 'modules/google-map/',
                'url' => FP_BB_MODULES_URL . 'modules/google-map/',
            )
        );
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
    'FpBbGoogleMap',
    array(
        'general' => array(
            'title' => 'General',
            'sections' => array(
                'maps_api' => array(
                    'title' => 'Google Maps API',
                    'fields' => array(
                        'api_key' => array(
                            'type' => 'text',
                            'label' => 'API Key',
                        )
                    )
                ),
                'map_heading' => array(
                    'title' => 'Map Heading',
                    'fields' => array(
                        'heading_text' => array(
                            'type' => 'text',
                            'label' => 'Heading Text',
                        ),
                        'heading_typography' => array(
                            'type' => 'typography',
                            'label' => 'Typography',
                            'responsive' => true,
                            'preview' => array(
                                'type' => 'css',
                                'selector' => '.mapHeading',
                            ),
                        )
                    )
                ),
                'map_location' => array(
                    'title' => 'Map Location',
                    'fields' => array(
                        'center_lat' => array(
                            'type' => 'unit',
                            'label' => 'Center Latitude',
                            'default' => 0,
                        ),
                        'center_lng' => array(
                            'type' => 'unit',
                            'label' => 'Center Longitude',
                            'default' => 0,
                        ),
                        'zoom' => array(
                            'type' => 'unit',
                            'label' => 'Zoom Level',
                            'default' => 6,
                            'slider' => array(
                                'min' => 0,
                                'max' => 20,
                            )
                        )
                    )
                )
            )
        ),
        'map_markers' => array(
            'title' => 'Map Markers',
            'sections' => array(
                'markers' => array(
                    'title' => 'Markers',
                    'fields' => array(
                        'markers' => array(
                            'type' => 'form',
                            'label'  => 'Marker',
                            'form' => 'map_markers_form',
                            'preview_text' => 'label',
                            'multiple' => true,
                        ),
                    ),
                )
            )
        )
    )
);

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form(
    'map_markers_form', array(
        'title' => 'Add Marker',
        'tabs'  => array(
            'general' => array(
                'title'    => 'General',
                'sections' => array(
                    'general' => array(
                        'title'  => '',
                        'fields' => array(
                            'label' => array(
                                'type' => 'text',
                                'label' => 'Label',
                            ),
                            'marker_lat' => array(
                                'type' => 'unit',
                                'label' => 'Marker Latitude',
                                'default' => 0,
                            ),
                            'marker_lng' => array(
                                'type' => 'unit',
                                'label' => 'Marker Longitude',
                                'default' => 0,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    )
);
