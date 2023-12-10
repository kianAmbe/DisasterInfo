<?php

// Replace 'YOUR_HERE_WEATHER_API_KEY' with your actual HERE Weather API key
$apiKey = 'qZHqrsVRjAx8TvO8Lnc3sM0yxj7NIxDn_ZgtMx_BckQ';
$latitude = 11.2543; // Tacloban City's latitude
$longitude = 124.9617; // Tacloban City's longitude

// Construct the API endpoint URL
$apiUrl = "https://weather.ls.hereapi.com/weather/1.0/report.json?product=observation&latitude={$latitude}&longitude={$longitude}&apiKey={$apiKey}";

// Fetch weather data
$weatherData = file_get_contents($apiUrl);

if ($weatherData === false) {
    // Handle error if data retrieval fails
    echo json_encode(['error' => 'Error fetching weather data']);
} else {
    // Decode JSON response
    $weather = json_decode($weatherData, true);

    // Prepare weather information
    if (isset($weather['observations']['location'])) {
        $location = $weather['observations']['location'][0]['city'];
        $temperature = $weather['observations']['location'][0]['observation'][0]['temperature'];
        $description = $weather['observations']['location'][0]['observation'][0]['description'];

        // Return weather data as JSON
        echo json_encode([
            'location' => $location,
            'temperature' => $temperature,
            'description' => $description
        ]);
    } else {
        echo json_encode(['error' => 'Weather data not found']);
    }
}
?>
