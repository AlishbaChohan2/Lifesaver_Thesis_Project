let map, marker, geocoder, infowindow;

function initMap() {
    // Initialize the Geocoder and InfoWindow
    geocoder = new google.maps.Geocoder();
    infowindow = new google.maps.InfoWindow();

    // Use the Geolocation API to get the user's location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };

                // Initialize the map centered on the user's location
                map = new google.maps.Map(document.getElementById("map"), {
                    center: userLocation,
                    zoom: 15,
                });

                // Initialize the marker at the user's location
                marker = new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    draggable: true,
                });

                // Update the location input with the user's location
                updateLocationInput(userLocation);

                // Add dragend event to the marker
                google.maps.event.addListener(marker, "dragend", function () {
                    const position = marker.getPosition();
                    updateLocationInput(position);
                });

                // Add click event to the map
                google.maps.event.addListener(map, "click", function (event) {
                    marker.setPosition(event.latLng);
                    updateLocationInput(event.latLng);
                });
            },
            (error) => {
                console.error("Geolocation failed: ", error);
                fallbackToDefaultLocation();
            }
        );
    } else {
        console.error("Geolocation is not supported by this browser.");
        fallbackToDefaultLocation();
    }
}

// Function to update location input with an address
function updateLocationInput(latLng) {
    geocoder.geocode({ location: latLng }, function (results, status) {
        if (status === "OK" && results[0]) {
            const address = results[0].formatted_address;
            document.getElementById("pres_add").value = address;
        } else {
            console.error("Geocode was not successful for the following reason: " + status);
        }
    });
}

// Fallback to a default location (e.g., Debrecen, Hungary) if Geolocation fails
function fallbackToDefaultLocation() {
    const defaultLocation = { lat: 47.5316, lng: 21.6273 }; // Debrecen, Hungary
    map = new google.maps.Map(document.getElementById("map"), {
        center: defaultLocation,
        zoom: 15,
    });

    marker = new google.maps.Marker({
        position: defaultLocation,
        map: map,
        draggable: true,
    });

    google.maps.event.addListener(marker, "dragend", function () {
        const position = marker.getPosition();
        updateLocationInput(position);
    });

    google.maps.event.addListener(map, "click", function (event) {
        marker.setPosition(event.latLng);
        updateLocationInput(event.latLng);
    });
}
