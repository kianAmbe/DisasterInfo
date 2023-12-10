<!DOCTYPE html>
<html>
<head>
    <title>Mapbox Integration with PHP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet" />
    <style>
        /* Set map container to fill the screen */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        #map {
            height: 100%;
        }
    </style>
</head>
<body>

<div id="map"></div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiaW1wb3J0YW50aW52aXRlIiwiYSI6ImNscHowbjVxNjB5b2cyam9hZGw2amg5MGEifQ.9ZlosnhXR7Sq6UBv-hrCvw'; // Replace with your Mapbox access token

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11', // Replace with your preferred map style
        center: [125.0045, 11.2455], // Tacloban City's coordinates
        zoom: 12 // Adjust the zoom level as needed
    });

    // Add controls, layers, weather overlays, etc., as needed
    // For example, adding weather layers or heatmaps would require additional code using Mapbox's APIs
</script>

</body>
</html>
