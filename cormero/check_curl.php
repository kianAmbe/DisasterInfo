<?php
// Check if cURL extension is enabled
if (function_exists('curl_version')) {
    echo "cURL is installed and enabled in PHP.\n";
    $curl_info = curl_version();
    echo "cURL Version: " . $curl_info['version'] . "\n";
    echo "cURL SSL Version: " . $curl_info['ssl_version'] . "\n";
} else {
    echo "cURL is not installed or enabled in PHP.\n";
}
