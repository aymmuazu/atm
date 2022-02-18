                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB0ybb3hsDdLhdswqTdPknzm3YpEUn_WDA"></script>
                    <script>
                        var map;
                        var infowindow;

                        function initialize() {
                        var center = new google.maps.LatLng(localStorage.getItem("long"), localStorage.getItem("lati"));
                        map = new google.maps.Map(document.getElementById('map'), {
                            center: center,
                            zoom: 15
                        });

                        var request = {
                            location: center,
                            radius: 10047,
                            types: ['atm']
                        };
                        infowindow = new google.maps.InfoWindow();

                        var service = new google.maps.places.PlacesService(map);

                        service.nearbySearch(request, callback);
                        }

                        function callback(results, status) {
                        if (status == google.maps.places.PlacesServiceStatus.OK) {
                            for (var i = 0; i < results.length; i++) {
                            createMarker(results[i]);
                            }
                        }
                        }
                        function createMarker(place) {
                        var placeLoc = place.geometry.location;
                        var marker = new google.maps.Marker({
                            map: map,
                            position: place.geometry.location
                        });

                        google.maps.event.addListener(marker, 'click', function(){
                            infowindow.setContent(place.name);
                            infowindow.open(map, this);
                        })

                        }

                        google.maps.event.addDomListener(window, 'load', initialize);
                        function getGeolocation() {
                    navigator.geolocation.getCurrentPosition(drawMap);
                    }
                    function drawMap(geoPos) {
                    geolocate = new google.maps.LatLng(geoPos.coords.latitude, geoPos.coords.longitude);
                    let mapProp = {
                        center: geolocate,
                        zoom:5,
                    };
                    let map=new google.maps.Map(document.getElementById('canvas'),mapProp);
                    let infowindow = new google.maps.InfoWindow({
                        map: map,
                        position: geolocate,
                        content:
                        `Location from HTML5 Geolocation:
                            <br>Latitude: ${geoPos.coords.latitude}
                            <br>Longitude: ${geoPos.coords.longitude}`
                        });
                    }
                    getGeolocation();
                    </script>
                    <style>
                        #map {
                            height: 50%;
                            width: 40%;
                        }
                    </style>
                    <div id="map"></div>