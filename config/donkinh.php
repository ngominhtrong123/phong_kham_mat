<?php
	require_once"database.php";

	class Donkinh{

		public function getrow_benhnhan($id){
			$db = new Database();
			$sql = " SELECT * FROM benhnhan where MaBN = '$id' ";
			$result = $db->getrow($sql);
			return $result;
		}

		public function nhap_donkinh($id_benhnhan,$ghichu,$taikham,$mt_sp,$mt_cy,$mt_axe,$mt_va,$mt_ad,$mt_kc,$mt_kq,$mp_sp,$mp_cy,$mp_axe,$mp_va,$mp_ad,$mp_kc,$mp_kq){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
	 		$time = date("Y-m-d H:i:sa");
	 		$Subtime = substr($time,0,19);
			$db = new Database();
			$sql = "INSERT INTO donkinh(IdBN,GhiChu,TaiKham,MT_SP,MT_CY,MT_AXE,MT_VA,MT_AD,MT_KC,MT_KQ,MP_SP,MP_CY,MP_AXE,MP_VA,MP_AD,MP_KC,MP_KQ,NgayKeDon) VALUES('$id_benhnhan','$ghichu','$taikham','$mt_sp','$mt_cy','$mt_axe','$mt_va','$mt_ad','$mt_kc','$mt_kq','$mp_sp','$mp_cy','$mp_axe','$mp_va','$mp_ad','$mp_kc','$mp_kq','$Subtime')";
			$result = $db->query($sql);
		}

		public function getrow_thuoc($id)
		{
			$db = new Database();
			$sql = "SELECT * FROM khothuoc WHERE id = '$id'";
			$result = $db->getrow($sql);
			return $result;
		}

		public function get_donkinh($id){
		$db = new Database();
		$sql = "SELECT Max(ID) as ID FROM donkinh Where IdBN ='$id' ";
		$result = $db->getrow($sql);
		return $result;
		}

		public function nhap_chitiet_donkinh($id,$id_benhnhan,$loaitrong){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	 	$time = date("Y-m-d H:i:sa");
	 	$Subtime = substr($time,0,19);
		$db = new Database();
		$sql = "INSERT INTO chitiet_donkinh(ID,IdBN,LoaiTrong,NgayKham)
		VALUES('$id','$id_benhnhan','$loaitrong','$Subtime')";
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