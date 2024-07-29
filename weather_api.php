<?php


error_reporting(E_ALL);
function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function get_weather_api_key()
{
    return getenv('WEATHER_API_KEY');

}

function get_weather_data_luxembourg()
{
    $project_root = __DIR__;
    $weather_lux_cache_filename = $project_root . '/' . 'weather_lux_cache_file.json';
    $cacheTime = 120;
    $last_time_read = filemtime($weather_lux_cache_filename);

    if (
        file_exists($weather_lux_cache_filename) && (time() -
            $last_time_read < $cacheTime)
    ) {
        debug_to_console("reading from file");
        $response = file_get_contents($weather_lux_cache_filename);
    } else {
        debug_to_console("reading from api and writing to file");
        $apiKey = get_weather_api_key();
        if (!$apiKey) {
            die('WEATHER_API_KEY not set in config file');
        }
        $url = "https://api.weatherapi.com/v1/forecast.json?key=" . get_weather_api_key() . "&q=Luxembourg&days=21&aqi=no&alerts=no";
        $response = file_get_contents($url);
        file_put_contents($weather_lux_cache_filename, $response);
    }

    if ($response === false) {
        die('Failed to fetch data from weather api');
    }

    return $response;
}


