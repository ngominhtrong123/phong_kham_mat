<?php
	require_once"header.php";
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container" style=" margin-top:10px;">
		<div class="col-md-12">
			<div class="col-md-12 text-center text-primary">
				<h3 style="margin-top: 0; margin-bottom: 20px;">CẬP NHẬT BỆNH NHÂN</h3>
			</div>
			<div class="col-md-12" hidden>
				<div class="alert alert-danger" role="alert">
					Mã bệnh nhân đã tồn tại, vui lòng kiểm tra trong <a href="#">Khám bệnh</a>
				</div>
			</div>
			<?php
				require_once"config/benhnhan.php";
				require_once"config/taikhoan.php";
				$query = new Nguoisudung();
				$data = $query->getrow_taikhoan($_SESSION['username']);
				$id = $_GET['id'];
				$db = new Benhnhan();
				$get = $db->lay_thongtin_dong($id);
				if(isset($_POST['CapNhat']))
				{
					$kq=$db->fix_thongtin(
						$id,
						$_POST['SDT'],
						$_POST['TenBN'],
						$_POST['NgaySinh'],
						$_POST['CMND'],
						$_POST['DiaChi'],
						$_POST['GioiTinh']);
					if($kq){
						echo"<div class='col-md-12 text-center' >";
							echo"<div class='alert alert-success' role='alert'>";
								echo $kq;
							echo"</div>";
						echo"</div>";
						$result=$query->insert_log($data['MaNV'],$data['HoTen'],"cập nhật thông tin Bệnh nhân",$_POST['TenBN']);
						$get = $db->lay_thongtin_dong($id);
					}

				}

			?>

			<form role="form" method='POST'>
				<div class="col-md-12" style="padding:0;">
					<div class="col-md-4">
						<div class="form-group">
							<label>Họ Và Tên</label>
							<input type="text" class="form-control" name="TenBN" required value="<?php echo $get['HoTenBN'];?>" autofocus >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Ngày Sinh</label>
							<input type="date" class="form-control" placeholder="dd/mm/yyyy" name="NgaySinh" required value="<?php echo $get['NamSinh'];?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Giới Tính</label>
							<select class="form-control" name="GioiTinh">
								<?php
									if($get['GioiTinh']==0)
									{
										echo"<option value='0' selected>Nam</option>";
										echo"<option value='1'>Nữ</option>";

									}
									else
									{
										echo"<option value='0' >Nam</option>";
										echo"<option value='1' selected>Nữ</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Địa Chỉ</label>
							<input type="text" class="form-control" name="DiaChi" required value="<?php echo $get['DiaChi'];?>" >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Số điện thoại</label>
							<input type="text" class="form-control" name="SDT" required value="<?php echo $get['SDT'];?>" >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Số CMND</label>
							<input type="text" class="form-control" name="CMND" required value="<?php echo $get['CMND'];?>">
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center">
					 <button type="submit" class="btn btn-info" name='CapNhat'>Cập Nhật</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>