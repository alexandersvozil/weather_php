<?php

$apiKey = '1b4b78c66081400dae0140432243006';
$url = "https://api.weatherapi.com/v1/forecast.json?key=" . $apiKey . "&q=Luxembourg&days=21&aqi=no&alerts=no";
$response = file_get_contents($url);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    <link rel="stylesheet" href="./app.css">

    <title>Weather App</title>

    <style>

    </style>

    <script>
        window.mydata = JSON.parse('<?php echo $response ?>');
    </script>

    <script src="script.js" defer></script>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="card shadow-lg mt-5">
                <div class=" card-body p-5">
                    <h1 class="card-title text-center mb-4">🇱🇺 Next Good Weather:</h1>
                    <h2 class="text-center mb-4">☀️
                        <span id="nextGoodWeather"></span>☀️
                    </h2>
                    <p class="text-center mb-4">Countdown:
                        <span id="countdown"></span>
                        <span id="emoji"></span>
                    </p>


                </div>
            </div>
        </div>
    </div>

    </div>

    <footer class="text-center mt-4">
        <a name="" id="shareButton" class="btn btn-light" href="#" role="button">Share
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path
                    d="M5.5 9.75v10.5c0 .138.112.25.25.25h12.5a.25.25 0 0 0 .25-.25V9.75a.25.25 0 0 0-.25-.25h-2.5a.75.75 0 0 1 0-1.5h2.5c.966 0 1.75.784 1.75 1.75v10.5A1.75 1.75 0 0 1 18.25 22H5.75A1.75 1.75 0 0 1 4 20.25V9.75C4 8.784 4.784 8 5.75 8h2.5a.75.75 0 0 1 0 1.5h-2.5a.25.25 0 0 0-.25.25Zm7.03-8.53 3.25 3.25a.749.749 0 0 1-.326 1.275.749.749 0 0 1-.734-.215l-1.97-1.97v10.69a.75.75 0 0 1-1.5 0V3.56L9.28 5.53a.751.751 0 0 1-1.042-.018.751.751 0 0 1-.018-1.042l3.25-3.25a.75.75 0 0 1 1.06 0Z">
                </path>
            </svg>
        </a>
        <div>

            <a href="https://forms.gle/t7MYcikUqMoUMeV2A">Have feedback?</a>
    </footer>
    </div>

    <script src="./app.js" defer></script>
    <script>
        window.mydata = JSON.parse('<?php echo $response ?>');
    </script>
</body>

</html>