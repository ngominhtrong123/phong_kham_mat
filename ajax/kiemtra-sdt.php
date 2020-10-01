<?php
	require_once"../config/ajax.php";
	$db = new Ajax();
	$sdt = $_GET['sdt'];
	$result = $db->kiemtra_sdt($sdt);
	if($result>0)
	{
		echo"<div class='alert alert-danger' role='alert'>";
			echo"Số điện thoại này đã bị trùng. xin kiểm tra <a href='index.php'>Tại đây</a>";
		echo"</div>";
	}

?>