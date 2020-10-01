<?php
	require_once"../config/ajax.php";
	$db = new Ajax();
	$tenthuoc = $_GET['tenthuoc'];
	$result = $db->kiemtra_tenthuoc($tenthuoc);
	if($result>0)
	{
		echo"<div class='col-md-12' style='padding:0;' >";
			echo"<div class='alert alert-danger'  role='alert'>";
				echo"Thuốc này đã có trong kho, xin kiểm tra <a href='khothuoc.php'>Tại đây</a>";
			echo"</div>";
		echo"</div>";
	}

?>