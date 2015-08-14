<?php 
include("clases/conect.php");
$res1 = mysql_query("SELECT * FROM mensajes WHERE tipo = '1' ");
$res2 = mysql_query("SELECT * FROM mensajes WHERE tipo = '2' ");
$res3 = mysql_query("SELECT * FROM mensajes WHERE tipo = '3' ");
$res4 = mysql_query("SELECT * FROM mensajes WHERE tipo = '4' ");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/fancywebsocket.js"></script>
</head>

<body>
<div style="width:300px; height:200px; border:solid 1px #999999;float:left;">Martin<br />
<div id="1"><?php while($arr = mysql_fetch_array($res1)){ echo $arr['timestamp']." : ".$arr['mensaje']."<br>";}?></div></div>
<div style="width:300px; height:200px; border:solid 1px #999999;float:left;">Fernanda<br />
<div id="2"><?php while($arr = mysql_fetch_array($res2)){ echo $arr['timestamp']." : ".$arr['mensaje']."<br>";}?></div></div>
<div style="width:300px; height:200px; border:solid 1px #999999;float:left;">Laura<br />
<div id="3"><?php while($arr = mysql_fetch_array($res3)){ echo $arr['timestamp']." : ".$arr['mensaje']."<br>";}?></div></div>
<div style="width:300px; height:200px; border:solid 1px #999999;float:left;">Cesar<br />
<div id="4"><?php while($arr = mysql_fetch_array($res4)){ echo $arr['timestamp']." : ".$arr['mensaje']."<br>";}?></div></div>
</body>
</html>