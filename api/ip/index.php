<?php
// IP Geolocation API using ip.sb service

header('Content-Type: application/json; charset=utf-8');

// Get IP from URL parameter or use visitor's IP
$ip = $_GET['ip'] ?? $_SERVER['REMOTE_ADDR'];

// Validate IP address
if (!filter_var($ip, FILTER_VALIDATE_IP)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid IP address']);
    exit;
}

// Build API URL
$apiUrl = "https://api.ip.sb/geoip";
if ($ip !== $_SERVER['REMOTE_ADDR']) {
    $apiUrl .= "/" . $ip;
}

// Handle JSONP callback
$callback = $_GET['callback'] ?? null;
if ($callback) {
    $apiUrl .= "?callback=" . urlencode($callback);
}

// Fetch data from ip.sb API
$response = @file_get_contents($apiUrl);

if ($response === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch geolocation data']);
    exit;
}

// Return response
if ($callback) {
    // For JSONP, return as-is
    header('Content-Type: application/javascript; charset=utf-8');
    echo $response;
} else {
    // For JSON, return directly
    echo $response;
}
?>