(function () {
    var $map = $('.google-map')
    ,   mapObject;

    window.GoogleMapsLoaded = function () {
        var data = JSON.parse($map.attr('data-map'))
        ,   location = {
                lat: data.lat,
                lng: data.lng
            };

        if (data) {
            mapObject = new google.maps.Map($map[0], {
                styles: (typeof googleMapsStyle != 'undefined') ? googleMapsStyle : null,
                center: location,
                zoom: data.zoom,
                gestureHandling: 'cooperative'
            });
        }

        if (mapObject) {
            new google.maps.Marker({
                position: location,
                map: mapObject
            });
        }
    };
})();