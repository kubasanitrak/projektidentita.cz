<?php
/**
 * Block Name: BLOCK_customgooglemap
 *
 * This is the template that displays the featured news block.
 * @param   array $block The block settings and attributes.
 */
?>
<?php

// Create class attribute allowing for custom "className" values.
    // $CLS_W = 'map-container iframe-container lazyload';
    $CLS_W = 'map-container iframe-container';
    $GMAP_API_KEY = get_field( 'google_map_api_key' );
    $LAT = get_field( 'gps_n' );
    $LNG = get_field( 'gps_e' );
/*
    $CLS_W .= " custom-bgc custom-bgc-" . esc_attr($PS_BGR['value']);
    if($PS_OUTLINE):
        $CLS_W .= " outline";
    endif;
    if($PS_OUTLINE_C):
        $CLS_W .= " outline-" . esc_attr($PS_OUTLINE_C['value']);
    endif;
    if($PS_ROUNDED):
        $CLS_W .= " rounded";
    endif;
    if($PS_ROUNDED_VALS):
        // $CLS_W .= " rounded";
        foreach($PS_ROUNDED_VALS as $val) :
            $CLS_W .= " rounded-" . $val['value'];
        endforeach;
    endif;
*/
    // Create class attribute allowing for custom "className" values.
    $classes = ( ! empty( $block['className'] ) ) ? sprintf( $CLS_W . ' %s', $block['className'] ) : $CLS_W;
    $id = 'versatile-' . $block['id'];
?>
<div id="<?php echo esc_attr( $id ) ?>" class="<?php echo esc_attr( $classes ); ?>">
        <div class="overlay" onclick="style.pointerEvents='none'"></div>
        <div id="map" class="map-cont"></div>
        <script>
            var map;
            let _LAT = '<?php echo $LAT; ?>',
                _LNG = '<?php echo $LNG; ?>';

                _LAT = parseFloat(_LAT);
                _LNG = parseFloat(_LNG);

// console.log(_LAT + "-" + _LNG);
            function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: _LAT, lng: _LNG},
                zoom: 17,
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: false,
                styles: [{"elementType": "geometry", "stylers": [{"color": "#0131C3"} ] }, {"elementType": "labels.icon", "stylers": [{"color": "#000B2D"} ] }, {"elementType": "labels.text.fill", "stylers": [{"color": "#000B2D"} ] }, {"elementType": "labels.text.stroke", "stylers": [{"color": "#0133CC"} ] }, {"featureType": "administrative", "elementType": "geometry", "stylers": [{"color": "#757575"} ] }, {"featureType": "administrative.country", "elementType": "labels.text.fill", "stylers": [{"color": "#000B2D"} ], "elementType": "labels.text.stroke", "stylers": [{"color": "#0133CC"} ] }, {"featureType": "administrative.land_parcel", "stylers": [{"visibility": "on"} ] }, {"featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [{"color": "#000B2D"} ] }, {"featureType": "poi", "elementType": "labels.text.fill", "stylers": [{"color": "#000B2D"} ] }, {"featureType": "poi.business", "stylers": [{"visibility": "off"} ] }, {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#0128A2"} ] }, {"featureType": "poi.park", "elementType": "labels.text", "stylers": [{"visibility": "off"} ] }, {"featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [{"color": "#000B2D"} ] }, {"featureType": "poi.park", "elementType": "labels.text.stroke", "stylers": [{"visibility": "off"} ] }, {"featureType": "road", "elementType": "geometry.fill", "stylers": [{"color": "#0133CC"} ] }, {"featureType": "road", "elementType": "labels.text.fill", "stylers": [{"color": "#000B2D"} ] }, {"featureType": "road", "elementType": "labels.text.stroke", "stylers": [{"color": "#0133CC"} ] }, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#0133CC"} ] }, {"featureType": "road.highway", "elementType": "geometry", "stylers": [{"color": "#0133CC"} ] }, {"featureType": "road.highway.controlled_access", "elementType": "geometry", "stylers": [{"color": "#0133CC"} ] }, {"featureType": "road.local", "elementType": "labels.text.fill", "stylers": [{"color": "#000B2D"} ] }, {"featureType": "road.local", "elementType": "labels.text.stroke", "stylers": [{"color": "#0133CC"} ] }, {"featureType": "transit", "elementType": "labels.text.fill", "stylers": [{"color": "#000B2D"} ] }, {"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#25251F"} ] }, {"featureType": "water", "elementType": "labels.text.fill", "stylers": [{"color": "#000B2D"} ] } ]

                // #2a2a27
            });
            var image = '<?php echo get_template_directory_uri(); ?>' +'/assets/images/versatile-map-marker.png';
            var MAPMarker = new google.maps.Marker({
                position: {lat: _LAT, lng: _LNG},
                map: map,
                icon: image
            });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?=$GMAP_API_KEY;?>&callback=initMap" async defer></script>
    </div>