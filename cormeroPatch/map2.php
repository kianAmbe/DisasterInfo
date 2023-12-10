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
      position: relative;
      height: 100vh;
      width: 100%;
      overflow: hidden;
    }

    .map-image {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 100%;
      max-height: 100%;
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
      z-index: 1000;
    }

    .go-home:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div id="map">
    <img class="map-image" src="img/maptac.jpeg" alt="Map Image">
  </div>

  <a href="index.php" class="go-home">Go Home</a>


</body>
</html>
