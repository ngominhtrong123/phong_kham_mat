<?php
	require_once"../config/thuoc.php";
	if($_GET['soluong']!=''){
		$dongia = $_GET['dongia'];
		$soluong = $_GET['soluong'];
		$id = $_GET['IdThuoc'];
		$db = new Thuoc();
		$result = $db->get_row_thongtinthuoc($id);
		if($soluong>$result['SoLuong'])
		{
			echo "<span style='color:#bd0103'>Lỗi vượt quá số lượng trong kho: </span>"."Thuốc '".$result['TenThuoc']."' chỉ còn ".$result['SoLuong']." ".$result['DonViTinh']." ở trong kho!";
		}
		else
		{
			$ThanhTien = $soluong*$dongia;
			echo number_format($ThanhTien);
		}
	}

?>