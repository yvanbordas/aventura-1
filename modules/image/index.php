<?php
	$name = substr(md5($_POST['image']), 0, -4) . '.png';
	$image = imagecreatefrompng($_POST['image']);
	imagepng($image, 'modules/upload/cache/' . $name, 9);

	echo json_encode(Array('success' => true, 'image' => $name));