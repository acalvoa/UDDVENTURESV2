<?php
	header('Content-Type: image/jpeg');
	//$IP = "201.221.123.194";
	$IP = "10.185.0.91";
	$PORT = '9200';
	$imagen = file_get_contents('http://'.$IP.':'.$PORT.'/udd/attachment/'.$_GET['image']);
	$imagen = json_decode($imagen);
	echo json_encode();
	echo file_get_contents($imagen->_source->sizes[0]->bookmark);
?>