<?php
	require_once'database.php';

	class Ajax{

		public function kiemtra_sdt($sdt)
		{
			$db = new database();
			$sql = "SELECT * FROM benhnhan WHERE SDT = '$sdt'";
			$result = $db->num_rows($sql);
			return $result;
		}

		public function search_sdt($sdt)
		{
			$db = new database();
			$sql = "SELECT * FROM benhnhan WHERE SDT LIKE '%$sdt%' ";
			$result = $db->getdata($sql);
			return $result;
		}
		public function search_cmnd($cmnd)
		{
			$db = new database();
			$sql = "SELECT * FROM benhnhan WHERE CMND LIKE '%$cmnd%' ";
			$result = $db->getdata($sql);
			return $result;
		}
		public function search_tenbn($tenbn)
		{
			$db = new database();
			$sql = "SELECT * FROM benhnhan WHERE HoTenBN LIKE '%$tenbn%' ";
			$result = $db->getdata($sql);
			return $result;
		}
		public function search_benhnhan($timkiem)
		{
			$db = new database();
			$sql = "SELECT * FROM benhnhan WHERE HoTenBN LIKE '%$timkiem%' OR SDT LIKE '%$timkiem%' OR CMND  LIKE '%$timkiem%' ";
			$result = $db->getdata($sql);
			return $result;
		}
		public function kiemtra_tenthuoc($tenthuoc){
			$db = new database();
			$check = "SELECT * FROM khothuoc WHERE TenThuoc = '$tenthuoc'";
			$num = $db->num_rows($check);
			return $num;	
		}
		public function themthuoc($tenthuoc,$donvitinh,$dongia,$soluong)
		{
			$db = new database();
			$sql = "INSERT INTO khothuoc(TenThuoc,DonViTinh,DonGia,SoLuong) VALUES ('$tenthuoc','$donvitinh','$dongia','$soluong')";
				$result=$db->query($sql);
				if($result)
				{
					// header('location:danhsachbenhnhan.php');
					// exit();
					echo"<script>";
					echo"alert('Thêm thành công')";
					echo"</script>";
				}
		}
		public function search_tenthuoc($tenthuoc)
		{
			$db = new database();
			$sql = "SELECT * FROM khothuoc WHERE TenThuoc LIKE '%$tenthuoc%'";
			$result = $db->getdata($sql);
			return $result;
		}
		public function show_thuoc($tenthuoc)
		{
			$db = new database();
			$sql = "SELECT * FROM khothuoc WHERE TenThuoc = '$tenthuoc'";
			$result = $db->getrow($sql);
			return $result;
		}
		public function getrow_thuoc($id)
		{
			$db = new database();
			$sql = "SELECT * FROM khothuoc WHERE id = '$id'";
			$result = $db->getrow($sql);
			return $result;
		}
		public function search_donmau($tenbenh)
		{
			$db = new database();
			$sql = "SELECT * FROM donthuoc WHERE ChuanDoan LIKE '%$tenbenh%'";
			$result = $db->getdata($sql);
			return $result;
		}
		public function get_donmau($id)
		{
			$db = new database();
			$sql = "SELECT * FROM chitiet_donthuoc WHERE ID = '$id'";
			$result = $db->getdata($sql);
			return $result;
		}
		public function search_tenvattu($tenvattu)
		{
			$db = new database();
			$sql = "SELECT * FROM vattu WHERE TenVatTu LIKE '%$tenvattu%'";
			$result = $db->getdata($sql);
			return $result;
		}
	}

?>