(function () {
    var $map = $('.google-map')
    ,   mapObject;

    var pinVector = 'M 11 0C 4.93457 0 0 5.01433 0 11.1782C 0 13.7126 0.85789 16.1949 2.41579 18.1685C 4.32988 20.5932 10.3537 26.3798 10.6093 26.6251L 11 27L 11.3907 26.6251C 11.646 26.3801 17.6698 20.5935 19.5842 18.1685C 21.1421 16.1955 22 13.7129 22 11.1782C 21.9997 5.01433 17.0654 0 11 0ZM 11 15.2319C 8.80053 15.2319 7.01097 13.4133 7.01097 11.1782C 7.01097 8.94302 8.80024 7.12443 11 7.12443C 13.1998 7.12443 14.9893 8.94272 14.9893 11.1782C 14.989 13.4136 13.1995 15.2319 11 15.2319Z';

    window.GoogleMapsLoaded = function () {
        console.log(roccoMapData);

        if (
            $map.length > 0 &&
            typeof roccoMapData != 'undefined' &&
            roccoMapData.location &&
            roccoMapData.zoom
        ) {
            mapObject = new google.maps.Map($map[0], {
                center: roccoMapData.location,
                zoom: roccoMapData.zoom,
                gestureHandling: 'cooperative'
            });
        }

        if (mapObject) {
            new google.maps.Marker({
                position: roccoMapData.location,
                map: mapObject,
                icon: $.extend({
                    path: pinVector,
                    anchor: new google.maps.Point(11, 26)
                }, roccoMapData.pin)
            });
        }
    };
})();