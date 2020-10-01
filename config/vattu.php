<?php
	require_once'database.php';

	class Vattu{
		public function themvattu($tenvt,$donvitinh,$giaban,$soluong,$gianhap)
		{
			$db = new database();
			$check = "SELECT * FROM vattu WHERE TenVatTu = '$tenvt'";
			$num = $db->num_rows($check);
			if($num>0)
			{
				echo"<script>";
				echo"alert('Tên vật tư bị trùng')";
				echo"</script>";
			}
			else
			{
				$sql = "INSERT INTO vattu(TenVatTu,DonViTinh,GiaBan,SoLuong,GiaNhap,TrangThai) VALUES ('$tenvt','$donvitinh','$giaban','$soluong','$gianhap','1')";
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
		}

		public function get_data_vattu()
		{
			$db = new database();
			$sql = " SELECT * FROM vattu ORDER BY SoLuong";
			$result = $db->getdata($sql);
			return $result;
		}
		public function get_row_vattu($id)
		{
			$db = new database();
			$sql = " SELECT * FROM vattu WHERE id ='$id' ";
			$result = $db->getrow($sql);
			return $result;
		}
		public function fix_vattu($id,$tenvattu,$donvitinh,$giaban,$soluong)
		{
			$db= new database();
			$sql = "UPDATE vattu SET TenVatTu = '$tenvattu', DonViTinh = '$donvitinh', GiaBan = '$giaban', SoLuong = '$soluong'
			WHERE id = $id";
			$result = $db->query($sql);
			if($result)
			{
				return "Bạn đã cập nhật thành công";
			}
		}
		public function delete_vattu($id)
		{
			$db = new database();
			$sql = "UPDATE vattu SET TrangThai = '0' WHERE id = '$id' ";
			$result = $db->query($sql);
		}

	}

?>