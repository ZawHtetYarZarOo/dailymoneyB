<?php 
	$upload = "upload";
	if (!is_dir($upload)) {
		$upload = mkdir("upload");
	}
	$name = $_FILES['profile']['name'];
	$tmp_name = $_FILES['profile']['tmp_name'];
	$type = $_FILES['profile']['type'];
	if ($type ="image/jpg "|| $type = "imgae/jpeg" || $type ="image/png" || $type ="image/gif") {
		move_uploaded_file($tmp_name,$upload."/".$name);
	}

 ?>