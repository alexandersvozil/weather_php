<?php
function get_claude_meme($weather_forecast)
{
    $project_root = __DIR__;
    $haiku_file = $project_root . '/' . 'haiku_file.json';
    $cacheTime = 60 * 60;
    $last_time_read = filemtime($haiku_file);

    if (
        file_exists($haiku_file) && (time() -
            $last_time_read < $cacheTime)
    ) {
        debug_to_console("reading from haiku file");
        $response = file_get_contents($haiku_file);
        return $response;
    } else {
        $api_key = getenv("ANTHROPIC_KEY");
        $api_url = 'https://api.anthropic.com/v1/messages';

        $system_prompt = "You are a Luxembourg weather oracle spicy meme generator. Your main goal is to make people stay on my website as long as possible. I will give you a weather forecast and you will give me a funny message depending on it. Also, make sure to add a funny emoji.";

        $data = [
            'model' => 'claude-3-haiku-20240307',
            'max_tokens' => 1000,
            'system' => $system_prompt,
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $weather_forecast
                ]
            ]
        ];

        $headers = [
            'Content-Type: application/json',
            'x-api-key: ' . $api_key,
            'anthropic-version: 2023-06-01'
        ];

        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        if (isset($result['content'][0]['text'])) {
            file_put_contents($haiku_file, $result['content'][0]['text']);

            return $result['content'][0]['text'];
        } else {
            echo "Error: Unable to generate response.";
        }
    }
}
?>