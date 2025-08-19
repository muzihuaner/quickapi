<?php
     $counter = intval(file_get_contents("counter.dat"));  
     $_SESSION['#'] = true;  
     $counter++;  
     $fp = fopen("counter.dat","w");  
     fwrite($fp, $counter);  
     fclose($fp); 
 ?>
<?php
 header('Content-type:application/json; charset=utf-8');
 $response = file_get_contents('http://news-at.zhihu.com/api/2/news/latest');
 if ($response === false) {
     http_response_code(500);
     echo json_encode(['error' => 'Failed to fetch data from Zhihu API']);
 } else {
     $data = json_decode($response);
     if (json_last_error() === JSON_ERROR_NONE) {
         echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
     } else {
         http_response_code(500);
         echo json_encode(['error' => 'Invalid JSON response from Zhihu API']);
     }
 }
?>