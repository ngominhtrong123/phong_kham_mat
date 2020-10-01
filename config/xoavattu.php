<?php
	require_once"vattu.php";
	$id= $_GET['id'];
	$db = new Vattu();
	$result = $db->delete_vattu($id);
	header('location:../khovattu.php');
?>