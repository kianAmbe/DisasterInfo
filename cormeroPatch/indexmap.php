
<!DOCTYPE html>
<html>
<head>
    <title>Leaflet with OpenWeatherMap</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        /* Set the map container to occupy the entire screen */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        #map {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([11.2455, 125.0045], 10); // Tacloban City's coordinates

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    // Function to add a weather layer to the map
    function addWeatherLayer() {
        fetchWeatherData(11.2455, 125.0045); // Tacloban City's coordinates
    }

    // Function to fetch weather data from OpenWeatherMap API
    function fetchWeatherData(latitude, longitude) {
        var apiKey = 'bbea5e674c08d47a0081b150f920c38a'; // Replace with your OpenWeatherMap API key
        var apiUrl = 'https://api.openweathermap.org/data/2.5/weather?lat=' + latitude + '&lon=' + longitude + '&appid=' + apiKey;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                // Process the weather data and add markers or layers to the map as needed
                console.log(data); // You can see the retrieved data in the browser console
                // Example: Display weather information in a popup on the map
                var weatherDescription = data.weather[0].description;
                var temperature = (data.main.temp - 273.15).toFixed(2) + '°C';
                var weatherPopup = 'Weather: ' + weatherDescription + '<br>Temperature: ' + temperature;

                L.marker([latitude, longitude]).addTo(map)
                    .bindPopup(weatherPopup)
                    .openPopup();
            })
            .catch(error => console.error('Error fetching weather:', error));
    }

    addWeatherLayer(); // Call the function to add weather data to the map
</script>

</body>
</html> 