<?php
	require_once("header.php");
?>
<div class="container">
	<div class="col-md-12 text-center">
		<h3 style="margin: 5px 0 30px 0; color:#bd0103;">Đổi Mật Khẩu</h3>
	</div>
	<?php 
		require_once "config/taikhoan.php";
		$get = new Nguoisudung();
		$data = $get->getrow_taikhoan($_SESSION['username']);
		if(isset($_POST['submit'])){
			if($_POST['password']==$_POST['repassword'] and md5($_POST['password_cu'])==$data['PassWord']){
					$result=$get->doipass(
					md5($_POST['password']),
					$data['MaNV']);
					$get->insert_log($data['MaNV'],$data['HoTen'],"đổi mật khẩu",$_SESSION['username']);
					echo"<div class='col-md-12' >";
					echo"<div class='alert alert-success' role='alert'>";
					echo"<p class='text-center'>đổi mật khẩu thành công</p>";
					echo"</div>";
					echo"</div>";
				}
			else
			{
				if($_POST['password']!=$_POST['repassword']){
					echo"<div class='col-md-12' >";
					echo"<div class='alert alert-danger' role='alert'>";
					echo"<p class='text-center'>Mật khẩu không khớp. xin vui lòng thử lại</p>";
					echo"</div>";
					echo"</div>";
				}
				if(md5($_POST['password_cu'])!=$data['PassWord']){
					echo"<div class='col-md-12' >";
					echo"<div class='alert alert-danger' role='alert'>";
					echo"<p class='text-center'>Mật khẩu cũ không đúng. xin vui lòng thử lại</p>";
					echo"</div>";
					echo"</div>";	
				}
				
			}		
		}
	?>
	<div class="col-md-6 col-md-offset-3">
		<form method="post" role="form" >	
			<div id="form-info">
				<div class="form-group">
					<label>Tài Khoản</label>
					<input type="taikhoan" class="form-control"  name="taikhoan" value="<?php echo $_SESSION['username']; ?>" disabled="disabled" >
				</div>
				<div class="form-group">
					<label>Mật khẩu cũ</label>
					<input type="password" class="form-control"  name="password_cu" required>
				</div>
				<div class="form-group">
					<label>Mật Khẩu mới</label>
					<input type="password" class="form-control"  name="password" required>
				</div>
				<div class="form-group">
					<label>Nhập lại mật khẩu mới</label>
					<input type="password" class="form-control"  name="repassword" required>
				</div>
			</div>
			<button name="submit" type="submit" class="center-block btn btn-success">Lưu thay đổi</button>
		</form>
	</div>
</div>
