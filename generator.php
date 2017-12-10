<?php
 if (!isset($_GET['color']) || !preg_match("/[\da-f]{6}/i", $_GET['color']))
   die('no hex color provided. example: ?color=ff0000');
 $color = $_GET['color'];
 header('Content-Description: File Transfer');
 header('Content-Type: application/octet-stream');
 header('Content-Disposition: attachment; filename=neon_tube_'.strtolower($color).'.dff');
 header('Content-Length: '.filesize('RedNeonTube1.dff'));
 echo hex2bin(str_replace('ff0000', $color, bin2hex(file_get_contents('RedNeonTube1.dff'))));
?>
