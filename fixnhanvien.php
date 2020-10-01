<?php
	require_once("header.php");
?>
<div class="container">
	<div class="col-md-12 text-center">
		<h3 style="margin: 5px 0 30px 0; color:#bd0103;">Sửa Thông Tin Người Dùng</h3>
	</div>
	<?php 
		require_once "config/taikhoan.php";
		$id = $_GET['id'];
		$db = new Nguoisudung();
		$get = $db->get_row_taikhoan($id);
		$data = $db->getrow_taikhoan($_SESSION['username']);
		if(isset($_POST['update'])){
				$result=$db->update_nguoidung(
				$_POST['phanquyen'],
				$_POST['TenNV'],
				$_POST['SDT'],
				$_POST['DiaChi'],
				$_POST['EMail'],
				$_POST['ngaysinh'],
				$_POST['vitri'],
				$id);
				if($result){
					echo"<div class='col-md-12 text-center' >";
						echo"<div class='alert alert-success' role='alert'>";
							echo"cập nhật thành công thông tin người dùng ";
							echo $get['HoTen'];
						echo"</div>";
					echo"</div>";
				}
				$db->insert_log($data['MaNV'],$data['HoTen'],"sửa thông tin người dùng",$get['HoTen']);	
		}
	?>
	<div class="col-md-6 col-md-offset-3">
		<form method="post" role="form" >
			<div class="form-group">
				<label>Họ và tên người dùng</label>
				<input type="text" class="form-control"  name="TenNV" required autofocus value="<?php echo $get['HoTen'];?>">
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
				<label>Vị Trí</label>
				<input type="text" class="form-control"  name="vitri" required>
			</div>
			<div class="form-group">
				<label>EMail</label>
				<input type="text" class="form-control"  name="EMail" required>
			</div>
			
			<div id="form-info">
				<div class="form-group">
					<label>Quyền đăng nhập</label>
					<select class="form-control" name="phanquyen">
						<option value="nguoidung">người dùng</option>
						<option value="admin">admin</option>
					</select>
				</div>
			</div>
			<button name="update" type="submit" class="center-block btn btn-info">Cập nhật</button>
		</form>
	</div>
</div>
