<?php
	require_once'database.php';

	class Benhnhan{

		public function thembenhnhan($sdt,$hoten,$ngaysinh,$cmnd,$diachi,$gioitinh,$trangthai)
		{
			date_default_timezone_set('Asia/Ho_Chi_Minh');
	 		$time = date("Y-m-d H:i:sa");
	 		$Subtime = substr($time,0,19);
			$db = new database();
			$check = "SELECT * FROM benhnhan WHERE SDT = $sdt";
			$num = $db->num_rows($check);
			if($num>0)
			{
				echo"<script>";
				    echo"alert('Số điện thoại bị trùng')";
				echo"</script>";
			}
			else
			{
				$sql = "INSERT INTO benhnhan(SDT,HoTenBN,NamSinh,CMND,DiaChi,GioiTinh,TrangThai,Log) VALUES ('$sdt','$hoten','$ngaysinh','$cmnd','$diachi','$gioitinh','$trangthai','$Subtime')";
				$result=$db->query($sql);
				if($result)
				{
					// header('location:danhsachbenhnhan.php');
					// exit();
					echo"<div class='col-md-12 text-center' >";
						echo"<div class='alert alert-success' role='alert'>";
							echo "Thêm thành công bệnh nhân $hoten";
						echo"</div>";
					echo"</div>";
					$sqlMaBN ="SELECT Max(MaBN) as MaBenhNhan FROM benhnhan";
					$MaxMaBN=$db->getrow($sqlMaBN);
					header("location:khambenh1.php?id=$MaxMaBN[MaBenhNhan]");
				}
				else{
					echo"<div class='col-md-12 text-center' >";
						echo"<div class='alert alert-danger' role='alert'>";
							echo "Thêm bệnh nhân không thành công";
						echo"</div>";
					echo"</div>";
				}
			}
		}
		public function lay_thongtin()
		{
			$db = new database();
			$sql = "SELECT * FROM benhnhan";
			$result = $db->getdata($sql);
			return $result;
		}
		public function lay_thongtin_dong($id)
		{
			$db = new database();
			$sql = "SELECT * FROM benhnhan WHERE MaBN = '$id'";
			$result = $db->getrow($sql);
			return $result;
		}
		public function fix_thongtin($id,$sdt,$hoten,$ngaysinh,$cmnd,$diachi,$gioitinh)
		{
			date_default_timezone_set('Asia/Ho_Chi_Minh');
	 		$time = date("Y-m-d H:i:sa");
	 		$Subtime = substr($time,0,19);
			$db= new database();
			$sql = "UPDATE benhnhan SET SDT = '$sdt',HoTenBN = '$hoten',NamSinh = '$ngaysinh',
			CMND = '$cmnd',DiaChi = '$diachi',GioiTinh = '$gioitinh',Log = '$Subtime'
			WHERE MaBN = $id";
			$result = $db->query($sql);
			if($result)
			{
				return "Bạn đã cập nhật thành công thông tin bệnh nhân $hoten";
			}
		}
		public function delete_bn($id)
		{
			$db = new database();
			$sql = "UPDATE benhnhan SET TrangThai ='0' WHERE MaBN = '$id' ";
			$result = $db->query($sql);
			if($result)
			{
				return 1;
			}
		}
	}

?>