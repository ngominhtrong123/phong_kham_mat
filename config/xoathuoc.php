<?php
	require_once"thuoc.php";
	$id= $_GET['id'];
	$db = new Thuoc();
	$result = $db->delete_thuoc($id);
	header('location:../khothuoc.php');
?>