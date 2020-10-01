<?php
	require_once'database.php';

	class Thuoc{
		public function themthuoc($tenthuoc,$donvitinh,$dongia,$soluong,$gianhap)
		{
			$db = new database();
			$check = "SELECT * FROM khothuoc WHERE TenThuoc = '$tenthuoc'";
			$num = $db->num_rows($check);
			if($num>0)
			{
				echo"<script>";
				echo"alert('Tên thuốc bị trùng')";
				echo"</script>";
			}
			else
			{
				$sql = "INSERT INTO khothuoc(TenThuoc,DonViTinh,DonGia,SoLuong,GiaNhap,TrangThai) VALUES ('$tenthuoc','$donvitinh','$dongia','$soluong','$gianhap','1')";
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

		public function lay_thongtinthuoc()
		{
			$db = new database();
			$sql = " SELECT * FROM khothuoc ORDER BY SoLuong";
			$result = $db->getdata($sql);
			return $result;
		}
		public function get_row_thongtinthuoc($id)
		{
			$db = new database();
			$sql = " SELECT * FROM khothuoc WHERE id ='$id' ";
			$result = $db->getrow($sql);
			return $result;
		}
		public function fix_thuoc($id,$tenthuoc,$donvitinh,$dongia,$soluong)
		{
			$db= new database();
			$sql = "UPDATE khothuoc SET TenThuoc = '$tenthuoc', DonViTinh = '$donvitinh', DonGia = '$dongia', SoLuong = '$soluong'
			WHERE id = $id";
			$result = $db->query($sql);
			if($result)
			{
				return "Bạn đã cập nhật thành công";
			}
		}
		public function delete_thuoc($id)
		{
			$db = new database();
			$sql = "UPDATE khothuoc SET TrangThai = '0' WHERE id = '$id' ";
			$result = $db->query($sql);
		}

	}

?>