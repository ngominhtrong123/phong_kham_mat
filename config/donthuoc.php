<?php
	require_once"database.php";

	class DonThuoc {

		public function getrow_benhnhan($id){
			$db = new Database();
			$sql = " SELECT * FROM benhnhan where MaBN = '$id' ";
			$result = $db->getrow($sql);
			return $result;
		}

		public function nhap_donthuoc($id_benhnhan,$chuandoan,$ghichu,$donmau){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
	 		$time = date("Y-m-d H:i:sa");
	 		$Subtime = substr($time,0,19);
			$db = new Database();
			$sql = "INSERT INTO donthuoc(IdBN,ChuanDoan,GhiChu,DonMau,NgayKeDon) VALUES('$id_benhnhan','$chuandoan','$ghichu','$donmau','$Subtime')";
			$result = $db->query($sql);
		}

		public function getrow_thuoc($id)
		{
			$db = new Database();
			$sql = "SELECT * FROM khothuoc WHERE id = '$id'";
			$result = $db->getrow($sql);
			return $result;
		}

		public function get_donthuoc($id){
		$db = new Database();
		$sql = "SELECT Max(ID) as ID FROM donthuoc Where IdBN ='$id' ";
		$result = $db->getrow($sql);
		return $result;
		}

		public function nhapdonthuoc($id,$id_benhnhan,$TenThuoc,$DonVi,$SoLuong,$DonGia,$ThanhTien,$CachDung){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	 	$time = date("Y-m-d H:i:sa");
	 	$Subtime = substr($time,0,19);
		$db = new Database();
		$sql = "INSERT INTO chitiet_donthuoc(ID,IdBN,TenThuoc,DonVi,SoLuong,DonGia,ThanhTien,CachDung,NgayKham)
		VALUES('$id','$id_benhnhan','$TenThuoc','$DonVi','$SoLuong','$DonGia','$ThanhTien','$CachDung','$Subtime')";
		$result = $db->query($sql);
		return $result;
		}

		public function update_sl($id,$SoLuong){
			$db = new Database();
			$sql = "UPDATE khothuoc SET SoLuong='$SoLuong' where id='$id'";
			$result = $db->query($sql);
			return $result;
		}

		public function update_thanhtien($maxid,$id_bn,$tongtien){
			$db = new Database();
			$sql = "UPDATE donthuoc SET GiaCuoi='$tongtien' where ID='$maxid' and IdBN = '$id_bn'";
			$result = $db->query($sql);
			return $result;
		}

		public function get_data_khambenh($idbn)
		{
			$db = new Database();
			$sql = "SELECT * FROM donthuoc Where IdBN ='$idbn' ";
			$result = $db->getdata($sql);
			return $result;
		}
		public function get_row_khambenh($IdKhamBenh){
		$db = new Database();
		$sql = "SELECT * FROM donthuoc Where ID ='$IdKhamBenh' ";
		$result = $db->getrow($sql);
		return $result;
		}
		public function getdata_donthuoc($IdKhamBenh){
		$db = new Database();
		$sql = "SELECT * FROM chitiet_donthuoc Where ID ='$IdKhamBenh' ";
		$result = $db->getdata($sql);
		return $result;
		}	
	}
?>