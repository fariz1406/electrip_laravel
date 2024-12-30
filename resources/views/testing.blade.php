<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Input</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdmfOHSWTdGQ3rz5c70Usj-L6TAScrCy0&callback=initMap&libraries=places" async defer></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h3>Pilih Lokasi</h3>
    <input type="text" id="searchInput" placeholder="Cari alamat" />
    <div id="map"></div>
    <form action="" method="POST">
        @csrf
        <input type="hidden" name="alamat" id="alamat">
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
        <button type="submit">Simpan Lokasi</button>
    </form>
    <script>
        let map;
        let marker;

        function initMap() {
            const initialLocation = { lat: -6.200000, lng: 106.816666 }; // Jakarta, default location
            map = new google.maps.Map(document.getElementById('map'), {
                center: initialLocation,
                zoom: 13,
            });

            const input = document.getElementById('searchInput');
            const searchBox = new google.maps.places.SearchBox(input);

            map.addListener('bounds_changed', () => {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener('places_changed', () => {
                const places = searchBox.getPlaces();

                if (places.length === 0) {
                    return;
                }

                const place = places[0];
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                // Set marker on map
                if (marker) {
                    marker.setMap(null);
                }
                marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location,
                });

                // Update form inputs
                document.getElementById('alamat').value = place.formatted_address;
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();

                map.setCenter(place.geometry.location);
            });

            map.addListener('click', (event) => {
                if (marker) {
                    marker.setMap(null);
                }
                marker = new google.maps.Marker({
                    position: event.latLng,
                    map: map,
                });

                // Reverse Geocoding for address
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({ location: event.latLng }, (results, status) => {
                    if (status === "OK" && results[0]) {
                        document.getElementById('alamat').value = results[0].formatted_address;
                        document.getElementById('latitude').value = event.latLng.lat();
                        document.getElementById('longitude').value = event.latLng.lng();
                    }
                });
            });
        }
    </script>
</body>
</html>
