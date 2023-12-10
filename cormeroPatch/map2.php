<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaflet Map with Search and Weather</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <style>
    /* Full-screen map */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    #map {
      height: calc(100% - 40px);
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

    #search-input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 4px;
      border: 1px solid #ccc;
      background-color: #fff;
    }

    .weather-info {
      position: absolute;
      top: 80px;
      right: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 10px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="search-container">
    <input id="search-input" type="text" placeholder="Search for a place">
  </div>

  <div id="map"></div>
  
  <div class="weather-info">
    <h3>Weather Information</h3>
    <p id="weather-data"></p>
  </div>

  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script>
    var map = L.map('map').setView([11.253823280334473, 124.96154022216797], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19
    }).addTo(map);

    var input = document.getElementById('search-input');

    var marker;
    var weatherDataElement = document.getElementById('weather-data');

    input.addEventListener('input', function(e) {
      if (marker) {
        map.removeLayer(marker);
      }
    });

    input.addEventListener('change', function(e) {
      var query = e.target.value;
      if (query !== '') {
        searchLocation(query);
      }
    });

    function searchLocation(query) {
      fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + query)
        .then(response => response.json())
        .then(data => {
          if (data.length > 0) {
            var latlng = [data[0].lat, data[0].lon];
            if (marker) {
              map.removeLayer(marker);
            }
            marker = L.marker(latlng).addTo(map);
            map.setView(latlng, 14); // Set the zoom level as needed

            // Fetch weather data for the searched location
            fetchWeatherData(latlng[0], latlng[1]);
          } else {
            alert('Location not found');
          }
        })
        .catch(error => console.error('Error searching location:', error));
    }

    // Function to fetch weather data from OpenWeatherMap API
    function fetchWeatherData(latitude, longitude) {
      var apiKey = 'bbea5e674c08d47a0081b150f920c38a'; // Replace with your OpenWeatherMap API key
      var apiUrl = 'https://api.openweathermap.org/data/2.5/weather?lat=' + latitude + '&lon=' + longitude + '&appid=' + apiKey;

      fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
          var weatherDescription = data.weather[0].description;
          var temperature = (data.main.temp - 273.15).toFixed(2) + '°C';
          var weatherInfo = 'Weather: ' + weatherDescription + '<br>Temperature: ' + temperature;

          weatherDataElement.innerHTML = weatherInfo;
        })
        .catch(error => console.error('Error fetching weather:', error));
    }
  </script>
</body>
</html>
