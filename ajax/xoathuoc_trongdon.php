<?php
	session_start();
	$id = $_GET['benhnhan'];
	$id_thuoc = $_GET['IdThuoc'];
	if(in_array($id_thuoc, $_SESSION["donthuoc".$id])){
		unset($_SESSION["donthuoc".$id][$id_thuoc]);
		unset($_SESSION["soluong".$id][$id_thuoc]);
	}
?>