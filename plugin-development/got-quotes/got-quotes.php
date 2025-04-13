<?php
/*
Plugin Name: Game of Thrones (GOT) Random Quotes
Description: Display Game of Thrones quotes that update every few seconds.
Version: 1.0
Author: Philip Dushie
*/

add_action('wp_enqueue_scripts', 'got_enqueue_scripts');
function got_enqueue_scripts() {
    wp_enqueue_script('got-quotes-js', plugin_dir_url(__FILE__) . 'got-quotes.js', [], null, true);

    // Pass the custom PHP endpoint to JS
    wp_localize_script('got-quotes-js', 'gotQuotes', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}

// AJAX handler (anonymous access allowed)
add_action('wp_ajax_nopriv_get_got_quote', 'get_got_quote');
add_action('wp_ajax_get_got_quote', 'get_got_quote');
function get_got_quote() {
    $apiUrl = 'https://api.gameofthronesquotes.xyz/v1/random';

    $options = [
        "http" => [
            "header" => "User-Agent: MyApp/1.0\r\n"
        ]
    ];
    $context = stream_context_create($options);

    $response = file_get_contents($apiUrl, false, $context);
    if ($response === false) {
        wp_send_json_error(['message' => 'Failed to fetch quote.']);
    } else {
        $data = json_decode($response, true);
        $quote = $data['sentence'];
        if(str_contains($quote, 'fuck') || str_contains($quote, 'Fuck') || str_contains($quote, 'whore') || str_contains($quote, 'kill')|| str_contains($quote, 'Kill')){
            $quote = "***";
        }
        $character = $data['character']['name'];
        wp_send_json_success([
            'quote' => $quote,
            'character' => $character
        ]);
    }
}

// Register shortcode to output the container
add_shortcode('got_quote', function() {
    return '<div id="got-quote-box">Loading quote...</div>';
});
