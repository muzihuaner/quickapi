<?php
$counter = intval(file_get_contents("counter.dat"));
$_SESSION['#'] = true;
$counter++;
$fp = fopen("counter.dat", "w");
fwrite($fp, $counter);
fclose($fp);

// 设置响应头为JSON格式
header('Content-Type: application/json; charset=utf-8');

// 定义要获取的API地址
$api_url = 'http://news-at.zhihu.com/api/2/news/latest';

// 初始化cURL会话
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过SSL证书验证（仅用于测试）
curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时时间
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // 跟随重定向

// 执行请求并获取响应
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);

// 关闭cURL资源
curl_close($ch);

// 处理响应
if ($http_code === 200 && !empty($response)) {
     // 直接返回获取到的内容
     echo $response;
} else {
     // 返回错误信息
     http_response_code(500);
     echo json_encode([
          'error' => true,
          'message' => '获取接口内容失败',
          'http_code' => $http_code,
          'curl_error' => $error ?: '无错误信息'
     ]);
}
?>