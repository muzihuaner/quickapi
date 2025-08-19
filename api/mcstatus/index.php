<?php
     $counter = intval(file_get_contents("counter.dat"));  
     $_SESSION['#'] = true;  
     $counter++;  
     $fp = fopen("counter.dat","w");  
     fwrite($fp, $counter);  
     fclose($fp); 
 ?>
<?php
header('Content-Type: application/json');

if (!isset($_GET['host'])) {
    echo json_encode(['error' => 'Missing host parameter']);
    exit;
}

$host = $_GET['host'];
$url = "https://api.mcstatus.io/v2/status/java/".urlencode($host);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    echo json_encode(['error' => 'Failed to fetch server status']);
    exit;
}

echo $response;
?>