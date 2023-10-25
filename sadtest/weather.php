<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="weatherstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-qzmEKz/Zv5CMU5PIjDeZd76F5/w42TyjL3rW/vXKbVlYAxV/4v5fqtliIedOhTJ2k" crossorigin="anonymous">
</head>
<body>
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
      ?>
      <div class="weather-container">
        <h1>Weather Updates</h1>
        <p class="location"><i class="fas fa-location-dot"></i> Location: <?php echo $location; ?></p>
        <p class="time"><i class="fas fa-clock"></i> Time: <?php echo $time; ?></p>
        <p class="temperature"><i class="fas fa-temperature-three-quarters"></i> Temperature: <?php echo $temperature; ?>&deg;C</p>
        <p class="humidity"><i class="fas fa-droplet"></i> Humidity: <?php echo $humidity; ?>%</p>
        <p class="cloud-cover"><i class="fas fa-cloud"></i> Cloud Cover: <?php echo $cloudCover; ?>%</p>
      </div>
      <?php
    } else {
      echo "Unable to retrieve weather data from the API.";
    }
  }
  ?>
</body>
</html>

