<head>
    <meta charset="UTF-8">
    <title>Philippines Earthquake Data</title>
    <link rel="stylesheet" type="text/css" href="earthquake.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Philippines Earthquake Data</h1>
        </header>

        <?php
        // Fetch earthquake data specifically for the Philippines
        $url = 'https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&minlatitude=4&maxlatitude=21&minlongitude=116&maxlongitude=127';

        // Fetch data from the USGS API
        $earthquakeData = file_get_contents($url);

        // Convert JSON response to PHP array
        $earthquakeData = json_decode($earthquakeData, true);

        // Check if earthquake data is retrieved successfully
        if ($earthquakeData && isset($earthquakeData['features'])) {
            echo '<table>';
            echo '<tr>';
            echo '<th>Magnitude</th>';
            echo '<th>Location</th>';
            echo '<th>Time</th>';
            echo '</tr>';
            
            // Loop through each earthquake record and display the details in table rows
            foreach ($earthquakeData['features'] as $earthquake) {
                $magnitude = $earthquake['properties']['mag'];
                $location = $earthquake['properties']['place'];
                $time = $earthquake['properties']['time'];
                $formattedTime = date('Y-m-d H:i:s', $time / 1000); // Convert time to a readable format

                // Highlight magnitudes equal to or higher than 5
                $magnitudeClass = ($magnitude >= 5) ? 'high' : '';
                $rowClass = ($magnitude >= 5) ? 'high-magnitude' : '';

                // Display earthquake details in table rows
                echo '<tr class="' . $rowClass . '">';
                echo '<td class="magnitude ' . $magnitudeClass . '">' . $magnitude . '</td>';
                echo '<td>' . $location . '</td>';
                echo '<td>' . $formattedTime . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            // Display a message if no earthquake data is available
            echo '<p>No earthquake data available for the Philippines.</p>';
        }
        ?>
    </div>
</body>
</html>
