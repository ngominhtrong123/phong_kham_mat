
<?php
	require_once"database.php";

	class Nguoisudung
	{
		public function Register($username,$password,$quyentruycap,$tennv,$sdt,$diachi,$email,$ngaysinh,$vitri){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
	 		$time = date("Y-m-d H:i:sa");
	 		$Subtime = substr($time,0,19);
			$db = new Database();
			$check = "SELECT * FROM nhanvien WHERE Username = '$username'";
			$num = $db->num_rows($check);
			if($num>0)
			{
				echo"<script>";
				    echo"alert('Tài khoản này đã được đăng kí!')";
				echo"</script>";
			}
			else
			{
				$sql = "INSERT INTO nhanvien(UserName,PassWord,QuyenTruyCap,HoTen,SDT,DiaChi,EMail,NgaySinh,ViTri,TrangThai,Log)
				VALUES('$username',md5($password),'$quyentruycap','$tennv','$sdt','$diachi','$email','$ngaysinh','$vitri','1','$Subtime')";
				$result = $db->query($sql);
				if($result){
					echo"<script>";
					    echo"alert('Thêm thành công')";
					echo"</script>";

				}
				else{
					echo"<script>";
					    echo"alert('Thêm thất bại')";
					echo"</script>";
					
				}	
			}
		}
		public function Login($username,$password){
			$db = new Database();
			$check=" SELECT * FROM nhanvien WHERE 
			UserName = '$username' and PassWord = '$password'";
			$num=$db->num_rows($check);
			if($num>0)
			{
				return 1;
				
			}
			else
			{
				
				return 0;
			}
		}
		public function redirect($url)
		{
			if(!empty($url))
			header("location:{$url}");
		}
		public function getrow_taikhoan($username){
			$db = new Database();
			$sql = "SELECT * FROM nhanvien WHERE UserName = '$username' ";
			$result = $db->getrow($sql);
			return $result;
		}
		public function get_row_taikhoan($id){
			$db = new Database();
			$sql = "SELECT * FROM nhanvien WHERE MaNV = '$id' ";
			$result = $db->getrow($sql);
			return $result;
		}
		public function insert_log($id_nguoidung,$ten_nguoidung,$thaotac,$chitiet_thaotac)
		{
			date_default_timezone_set('Asia/Ho_Chi_Minh');
	 		$time = date("Y-m-d H:i:sa");
	 		$Subtime = substr($time,0,19);
	 		$db = new Database();
	 		$sql = "INSERT INTO log (id_nguoidung,TenNguoiDung,ThaoTac_ThucHien,ChiTiet_ThaoTac,ThoiGian_ThucHien)
	 		VALUES('$id_nguoidung','$ten_nguoidung','$thaotac','$chitiet_thaotac','$Subtime')";
	 		$result = $db->query($sql);
	 		return $result;
		}
		public function doipass($password,$id)
		{	
			date_default_timezone_set('Asia/Ho_Chi_Minh');
	 		$time = date("Y-m-d H:i:sa");
	 		$Subtime = substr($time,0,19);
			$db = new Database();
			$sql = "UPDATE nhanvien SET PassWord = '$password',Log = '$Subtime' where MaNV='$id' ";
			$result = $db->query($sql);
			return $result;
		}
		public function get_data_nguoidung()
		{
			$db = new database();
			$sql = " SELECT * FROM nhanvien";
			$result = $db->getdata($sql);
			return $result;
		}
		public function update_nguoidung($quyentruycap,$tennv,$sdt,$diachi,$email,$ngaysinh,$vitri,$id)
		{	
			date_default_timezone_set('Asia/Ho_Chi_Minh');
	 		$time = date("Y-m-d H:i:sa");
	 		$Subtime = substr($time,0,19);
			$db = new Database();
			$sql = "UPDATE nhanvien SET QuyenTruyCap = '$quyentruycap',HoTen = '$tennv',SDT = '$sdt',DiaChi = '$diachi',EMail = '$email',NgaySinh = '$ngaysinh',ViTri = '$vitri',Log = '$Subtime' where MaNV='$id' ";
			$result = $db->query($sql);
			return $result;
		}
		public function delete_nguoidung($id)
		{
			$db = new database();
			$sql = "UPDATE nhanvien SET TrangThai ='0' WHERE MaNV = '$id' ";
			$result = $db->query($sql);
			if($result)
			{
				return 1;
			}
		}
	}
?>