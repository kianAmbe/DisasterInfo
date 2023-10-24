<?php
$api_key = 'yMRirOaf75MbCav5v5cZRpzCBm3KaS1J';
$latitude = 11.2543; // Replace with the desired latitude
$longitude = 124.9617; // Replace with the desired longitude

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.tomorrow.io/v4/weather/realtime?location=tacloban%20city%20magsaysay&apikey=$api_key",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data = json_decode($response, true);

  // Check if the response contains the expected structure
  if (isset($data['data']['time'])) {
    $time = $data['data']['time'];
    $values = $data['data']['values'];
    $temperature = $values['temperature'];
    $humidity = $values['humidity'];
    $cloudCover = $values['cloudCover'];
    $location = isset($data['location']['name']) ? $data['location']['name'] : "Unknown Location";

    // Display weather data and location
    echo "<h1>Weather Updates</h1>";
    echo "<p>Location: $location</p>";
    echo "<p>Time: $time</p>";
    echo "<p>Temperature: $temperature&deg;C</p>";
    echo "<p>Humidity: $humidity%</p>";
    echo "<p>Cloud Cover: $cloudCover%</p>";
  } else {
    echo "Unable to retrieve weather data from the API.";
  }
}
?>
