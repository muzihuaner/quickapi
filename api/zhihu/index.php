<?php
     $counter = intval(file_get_contents("counter.dat"));  
     $_SESSION['#'] = true;  
     $counter++;  
     $fp = fopen("counter.dat","w");  
     fwrite($fp, $counter);  
     fclose($fp);
     
     header('Content-type:application/json; charset=utf-8');
     readfile('http://news-at.zhihu.com/api/2/news/latest');
?>