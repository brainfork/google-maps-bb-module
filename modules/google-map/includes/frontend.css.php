/**
 * This file should contain frontend styles that 
 * will be applied to individual module instances.
 *
 * You have access to three variables in this file: 
 * 
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 */

.mapContainer {
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}

.map {
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}

<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'heading_typography',
	'selector' 	=> ".fl-node-$id .mapHeading",
) );