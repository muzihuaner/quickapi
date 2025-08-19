<?php
     $counter = intval(file_get_contents("counter.dat"));  
     $_SESSION['#'] = true;  
     $counter++;  
     $fp = fopen("counter.dat","w");  
     fwrite($fp, $counter);  
     fclose($fp); 
 ?>
<?php
// 设置响应头为JSON
header('Content-Type: application/json; charset=utf-8');

// 允许GET和POST请求
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET' || $method === 'POST') {
    // 获取请求参数
    $sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : '热歌榜';
    $mid = isset($_REQUEST['mid']) ? $_REQUEST['mid'] : '';
    $format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'json';
    
    // 参数验证
    $valid_sorts = ['热歌榜', '新歌榜', '飙升榜', '抖音榜', '电音榜'];
    if (!in_array($sort, $valid_sorts)) {
        $sort = '热歌榜';
    }
    
    // 构建API URL
    $api_url = 'https://api.uomg.com/api/rand.music';
    $params = [
        'sort' => $sort,
        'format' => $format
    ];
    
    if (!empty($mid)) {
        $params['mid'] = $mid;
    }
    
    $query_string = http_build_query($params);
    $full_url = $api_url . '?' . $query_string;
    
    // 调用外部API
    $response = file_get_contents($full_url);
    
    if ($format === 'mp3') {
        // 如果请求MP3格式，设置相应的响应头
        header('Content-Type: audio/mpeg');
        echo $response;
    } else {
        // 如果请求JSON格式，直接返回
        header('Content-Type: application/json; charset=utf-8');
        echo $response;
    }
} else {
    // 不支持的请求方法
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}
?>