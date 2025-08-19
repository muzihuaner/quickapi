<?php
     $counter = intval(file_get_contents("counter.dat"));  
     $_SESSION['#'] = true;  
     $counter++;  
     $fp = fopen("counter.dat","w");  
     fwrite($fp, $counter);  
     fclose($fp); 
 ?>
 
<?php
error_reporting(E_ALL & ~E_NOTICE);
header('Content-Type: application/json');

$qq = $_GET['qq'] ?? '';

if (!is_numeric($qq) || empty($qq)) {
    http_response_code(400);
    exit(json_encode(['code' => 40, 'msg' => '缺少有效QQ号码参数']));
}

$context = stream_context_create(['http' => ['timeout' => 5]]);
$data = @file_get_contents("http://webpresence.qq.com/getonline?type=1&$qq:", false, $context);

if ($data === false) {
    http_response_code(503);
    exit(json_encode(['code' => 50, 'msg' => '服务暂时不可用']));
}

switch (trim($data)) {
    case 'online[0]=0;':
        $response = ['code' => 20, 'msg' => '电脑离线'];
        break;
    case 'online[0]=1;':
        $response = ['code' => 21, 'msg' => '电脑在线'];
        break;
    default:
        http_response_code(500);
        $response = ['code' => 51, 'msg' => '未知状态'];
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>