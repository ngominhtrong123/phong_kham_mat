<?php
	require_once("header.php");
?>
<div class="container">
	<div class="col-md-12 text-center">
		<h3 style="margin: 5px 0 30px 0; color:#bd0103;">Cập Nhật Thông Tin Người Dùng</h3>
	</div>
	<?php 
		require_once "config/taikhoan.php";
		$get = new Nguoisudung();
		$data = $get->getrow_taikhoan($_SESSION['username']);
		if(isset($_POST['submit'])){
				$result=$get->Register(
				$_POST['username'],
				$_POST['password'],
				$_POST['phanquyen'],
				$_POST['TenNV'],
				$_POST['SDT'],
				$_POST['DiaChi'],
				$_POST['EMail'],
				$_POST['ngaysinh']);
				$get->insert_log($data['MaNV'],$data['HoTen'],"cập Nhật Thông Tin Người Dùng",$_POST['username']);	
		}
	?>
	<div class="col-md-6 col-md-offset-3">
		<form method="post" role="form" >
			<div class="form-group">
				<label>Họ và tên người dùng</label>
				<input type="text" class="form-control"  name="TenNV" required autofocus>
			</div>
			<div class="form-group">
				<label>Ngày sinh</label>
				<input type="date" class="form-control"  name="ngaysinh" required>
			</div>
			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="text" class="form-control"  name="SDT" required>
			</div>
			<div class="form-group">
				<label>Địa Chỉ</label>
				<input type="text" class="form-control"  name="DiaChi" required>
			</div>
			<div class="form-group">
				<label>EMail</label>
				<input type="text" class="form-control"  name="EMail" required>
			</div>
			<div class="form-group">
				<label>Tên đăng nhập</label>
				<input type="text" class="form-control"  name='username' required>
			</div>
			<div id="form-info">
				<div class="form-group">
					<label>Mật Khẩu</label>
					<input type="password" class="form-control"  name="password" required autocomplete="off">
				</div>
				<div class="form-group">
					<label>Nhập lại mật khẩu</label>
					<input type="password" class="form-control"  name="repassword" required autocomplete="off">
				</div>
				<div class="form-group">
					<label>Quyền đăng nhập</label>
					<select class="form-control" name="phanquyen">
						<option value="nguoidung">người dùng</option>
						<option value="admin">admin</option>
					</select>
				</div>
			</div>
			<button name="submit" type="submit" class="center-block btn btn-success">Tạo tài khoản</button>
		</form>
	</div>
</div>
