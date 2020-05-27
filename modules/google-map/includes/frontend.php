<?php
/**
 * Google Map module instance
 * 
 * PHP Version 7.3
 *
 * @category WordPress-plugin
 * @package  FpBbModules
 * @author   Kaleb J. Barker <messagekaleb@gmail.com>
 * @license  GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://bitbucket.org/brainfork/google-maps-bb-module/
 */

$mapId = 'map-' . $id;
$zoom = $settings->zoom ? $settings->zoom : 6;
$lng = $settings->center_lng ? $settings->center_lng : 0;
$lat = $settings->center_lat ? $settings->center_lat : 0;
?>
<div class="mapHeading">
    <span><?php echo $settings->heading_text; ?></span>
</div>
<div class="mapContainer">
    <div id="<?php echo $mapId ?>" class="map"></div>
</div>

<script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('<?php echo $mapId ?>'), {
        center: new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lng ?>),
        zoom: <?php echo $zoom; ?>
    });

    <?php 
    for ($i = 0; $i < count($settings->markers); $i++) : 
        $markerID = 'marker' . $i;
        $markerLabel = $settings->markers[$i]->label;
        $markerLat = $settings->markers[$i]->marker_lat;
        $markerLng = $settings->markers[$i]->marker_lng;
    ?>

    var infoWindow = new google.maps.InfoWindow();

    var <?php echo $markerID;?> = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $markerLat;?>, <?php echo $markerLng;?>),
        map: map
    });
    <?php echo $markerID; ?>.addListener('click', function() {
        infoWindow.setContent('<?php echo $markerLabel;?>')
        infoWindow.open(map, <?php echo $markerID;?>);
    });

    <?php endfor; ?>
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $settings->api_key; ?>&callback=initMap"
async defer></script>
