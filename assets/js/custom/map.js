(function($) {
    'use strict';
    function initializeContactMap() {
        if (Es_Trendy.map.contact_address === null) return;
        var loc = [];
        var map, mapProp, marker;
        var address = Es_Trendy.map.contact_address;

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                loc[0] = results[0].geometry.location.lat();
                loc[1] = results[0].geometry.location.lng();
            } else {
                console.log("Geocode was not successful for the following reason: " + status);
            }
            mapProp = {
                center: new google.maps.LatLng(loc[0], loc[1]),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var elems = document.getElementsByClassName('js-contact-map');
            for (var i = 0; i < elems.length; i++) {
                map = new google.maps.Map(elems[i], mapProp);

                marker = new google.maps.Marker({
                    position: {lat: loc[0], lng: loc[1]},
                    map: map,
                });
            }

        });

    }

    google.maps.event.addDomListener(window, 'load', initializeContactMap);

})(jQuery)
