<?php
     $counter = intval(file_get_contents("counter.dat"));  
     $_SESSION['#'] = true;  
     $counter++;  
     $fp = fopen("counter.dat","w");  
     fwrite($fp, $counter);  
     fclose($fp); 
 ?>
<?php
header('Access-Control-Allow-Origin:*');
 $str = file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
 if ($str === false) {
  exit('Failed to retrieve data from Bing');
 }
 $xml = simplexml_load_string($str);
 if ($xml && isset($xml->image->url)) {
  $imgurl = 'http://cn.bing.com' . $xml->image->url;
 }
 if(isset($imgurl) && $imgurl){
  header('Content-Type: image/JPEG');
  ob_end_clean();
  readfile($imgurl);
  flush(); ob_flush();
  exit();
 }else{
  exit('error');
 }
?>
