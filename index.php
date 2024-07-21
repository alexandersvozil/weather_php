<?php
error_reporting(E_ALL);
require "weather_api.php";
$response = get_weather_data_luxembourg();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Weather App</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="weather_script.js"></script>
    <script>
        window.mydata = <?php
        echo json_encode(json_decode($response, true));
        ?>;
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZGEHDYTC38"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-ZGEHDYTC38');
    </script>

</head>

<body class="bg-light" x-data="weatherApp">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card shadow-lg mt-5">
                <div class="card-body p-5">
                    <h1 class="card-title text-center mb-4">🇱🇺 Weather Oracle prediction</h1>
                    <h2 class="text-center mb-4">☀️
                        <span x-text="nextGoodWeather"></span>☀️
                    </h2>
                    <p class="text-center mb-4">Countdown:
                        <span x-text="countdown"></span>
                        <span x-text="emoji"></span>
                    </p>
                </div>


            </div>
        </div>
        <div class="row justify-content-center" x-show="showUmbrella">
            <div class="card shadow-lg mt-1">
                <div class="card-body p-5">
                    Need an <a href="https://amzn.to/4cGkhDT">umbrella? ☔️</a>
                </div>
            </div>
        </div>
    </div>

    </div>

    <footer class="text-center mt-4">
        <a class="btn btn-light" @click="shareToWhatsApp">Share
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


</body>

</html>