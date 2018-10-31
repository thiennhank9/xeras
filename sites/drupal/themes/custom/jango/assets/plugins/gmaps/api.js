var PageContact2 = function () {

    var lat, lng, scrollwheel, type, address;
    var gmapbg = document.getElementById('gmapbg');

    if(gmapbg != null) {
      lat = gmapbg.getAttribute('data-lat');
      lng = gmapbg.getAttribute('data-lng');
      scrollwheel = gmapbg.getAttribute('data-scrollwheel');
      type = gmapbg.getAttribute('data-type');
      address = gmapbg.getAttribute('data-address');
    }

    var _init = function () {
        if (type == 'panorama') {
            var mapbg = GMaps.createPanorama({
                el: '#gmapbg',
                lat: lat,
                lng: lng,
                scrollwheel: scrollwheel
            });
        }
        else if(gmapbg) {
            var mapbg = new GMaps({
                div: '#gmapbg',
                lat: lat,
                lng: lng,
                scrollwheel: scrollwheel
            });

            mapbg.addMarker({
                lat: lat,
                lng: lng,
                title: 'Your Location',
                infoWindow: {
                    content: address
                }
            });
        }
    }

    return {
        //main function to initiate the module
        init: function () {
            _init();
        }

    };
}();

$(document).ready(function () {
    PageContact2.init();
});