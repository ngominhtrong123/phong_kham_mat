<?php
	session_start();
	$id_thuoc = $_GET['IdThuoc'];
	$sl = $_GET['soluong'];
	$id_bn = $_GET['bn'];
	$_SESSION['soluong'.$id_bn][$id_thuoc]=$sl;
	
?>