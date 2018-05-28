<?php
/**
* Hämta data om närmsta hållplatser från trafiklab (SL)
*
* PHP version 7
* @category   json övning
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
* @link
* API-dok     https://www.trafiklab.se/api/sl-narliggande-hallplatser/dokumentation
* API-nyckel  5a04359da47042b7837f88a5c61908c9
*/
?>

<?php
// Inställningar
$SVAR = 50;
$RADIUS = 1000;

// Ta emot POST-data och validera
$lat = filter_input(INPUT_POST, "lat", FILTER_SANITIZE_STRING);
$lng = filter_input(INPUT_POST, "lng", FILTER_SANITIZE_STRING);

if ($lat && $lng) {

    // Adress till tjänsten
    $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?&originCoordLat=$lat&originCoordLong=$lng&maxresults=$SVAR&radius=$RADIUS&type=restaurant&keyword=cruise&key=AIzaSyBLj0FQepKTy7AsaZdXwDQ2WsW7HF_mFfg";

    // Hämta data och avkoda JSON-formatet
    $contents = file_get_contents($url);
    $stopData = json_decode($contents);
    $stops = $stopData->LocationList->StopLocation;
    //print_r($stops);

    $markers = "[";

    // Plocka ut all hållplatser och spara
    foreach ($stops as $stop) {
        $markers .= "['$stop->name', $stop->lat, $stop->lon],\n";
    }
    $markers = substr($markers, 0, -2) . "]";

    // Skapa Javascript svaret
    echo "function initMap() {
            var bounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14
            });\n";
    echo "var markers = $markers;\n";
    echo "for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });
        }\n
        map.fitBounds(bounds);\n
    }\n
    initMap();";
}
