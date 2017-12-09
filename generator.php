<?php
 if (!isset($_GET['color']) || strlen($_GET['color']) != 6) {
   echo "no hex color provided. example: generator.php?color=ff0000";
   exit;
 }

 $color = $_GET['color'];

 for ($i = 0; $i < strlen($color); $i++) {
   if (!is_numeric($color[$i]) && $color[$i] != 'a' && $color[$i] != 'b' && $color[$i] != 'c' && $color[$i] != 'd' &&
     $color[$i] != 'e' && $color[$i] != 'f') {
       echo "no hex color provided. example: generator.php?color=ff0000";
       exit;
   }
 }

 define('DIR', dirname(__FILE__));
 $file = DIR.'/tmp/'.$color;

 if (!file_exists($file)) {
   $hex = bin2hex(file_get_contents('RedNeonTube1.dff'));
   $hex = str_replace('ff0000', $color, $hex);

   file_put_contents($file, hex2bin($hex));
 }

 header('Content-Description: File Transfer');
 header('Content-Type: application/octet-stream');
 header('Content-Disposition: attachment; filename=neon_tube_'.$color.'.dff');
 header('Content-Length: '.filesize($file));
 readfile($file);
?>

