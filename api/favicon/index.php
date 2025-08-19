<?php
header('Content-Type: image/x-icon');

if (!isset($_GET['url'])) {
    header('HTTP/1.1 400 Bad Request');
    exit('URL parameter is required');
}

$url = $_GET['url'];

// 自动补全协议前缀
if (!preg_match('/^https?:\/\//i', $url)) {
    $url = 'https://' . $url;
}

if (!filter_var($url, FILTER_VALIDATE_URL)) {
    header('HTTP/1.1 400 Bad Request');
    exit('Invalid URL format');
}

$domain = parse_url($url, PHP_URL_HOST);
$scheme = parse_url($url, PHP_URL_SCHEME);
$faviconUrl = $scheme . '://' . $domain . '/favicon.ico';

// 尝试获取favicon，最多重试3次
$maxRetries = 3;
$retryCount = 0;
$data = null;
$httpCode = 0;

do {
    $ch = curl_init($faviconUrl);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
     
     // 根据协议设置SSL验证
     if (parse_url($faviconUrl, PHP_URL_SCHEME) === 'https') {
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     }
     
     curl_setopt($ch, CURLOPT_TIMEOUT, 5); // 5秒超时
     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); // 3秒连接超时
    
    $data = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    $retryCount++;
    
    if ($httpCode === 200 && !empty($data)) {
        break;
    }
    
    if ($retryCount < $maxRetries) {
        sleep(1); // 等待1秒后重试
    }
} while ($retryCount < $maxRetries);

if ($httpCode === 200 && !empty($data)) {
    echo $data;
} else {
    header('HTTP/1.1 404 Not Found');
    exit('Favicon not found: ' . ($error ?? 'Unknown error'));
}
?>