<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interactive Map</title>
  <style>
    /* Full-screen map */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    #map {
      height: 100%;
      width: 100%;
    }

    /* Search box styling */
    .search-container {
      position: absolute;
      z-index: 1000;
      top: 20px;
      left: 20px;
      max-width: 300px;
    }

    #pac-input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 4px;
      border: 1px solid #ccc;
      background-color: #fff;
    }

    /* Heading style */
    h1 {
      text-align: center;
      margin-top: 30px;
      font-size: 28px;
      color: #333;
    }

    .go-home {
      position: fixed;
      bottom: 20px;
      left: 20px; /* Changed the positioning to the left */
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      font-size: 16px;
    }

    .go-home:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="search-container">
    <input id="pac-input" type="text" placeholder="Search for a place">
  </div>

  <div id="map"></div>

  <a href="index.php" class="go-home">Go Home</a>

  <script>
    function initMap() {
      const map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 11.253823280334473, lng: 124.96154022216797 },
        zoom: 14,
        styles: [
          /* Add custom map styles here if needed */
        ]
      });

      const input = document.getElementById('pac-input');
      const searchBox = new google.maps.places.SearchBox(input);
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
      });

      let marker;

      searchBox.addListener('places_changed', function() {
        const places = searchBox.getPlaces();

        if (places.length === 0) {
          return;
        }

        if (marker) {
          marker.setMap(null);
        }

        const place = places[0];

        marker = new google.maps.Marker({
          map: map,
          title: place.name,
          position: place.geometry.location
        });

        map.setCenter(place.geometry.location);
        map.setZoom(14);
      });
    }
  </script>

  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC_p-FDRgTVcunWjEEx6qztbMx_YtItR8&libraries=places&callback=initMap">
  </script>
</body>
</html>
