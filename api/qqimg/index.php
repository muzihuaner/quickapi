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
header('Content-Type: text/plain');

$qq = $_GET['qq'] ?? '';

if (is_numeric($qq) && $qq !== '') {
    header('Cache-Control: public, max-age=86400');
    header('Location: https://q1.qlogo.cn/g?b=qq&nk='.$qq.'&s=100');
} else {
    http_response_code(400);
    echo '缺少有效的QQ号码参数';
}
?>