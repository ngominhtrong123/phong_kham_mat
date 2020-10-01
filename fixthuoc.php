<?php
	require_once"header.php";
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container-fluid" style=" margin-top:10px;">
		<div class="col-md-12">
			<div class="col-md-12 text-center text-primary">
				<h3>Sửa Loại Thuốc</h3>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php
					require_once"config/thuoc.php";
					require_once"config/taikhoan.php";
					$query = new Nguoisudung();
					$data = $query->getrow_taikhoan($_SESSION['username']);
					$id = $_GET['id'];
					$db = new Thuoc();
					$get = $db->get_row_thongtinthuoc($id);
					if(isset($_POST['CapNhat']))
					{
						$kq=$db->fix_thuoc(
							$id,
							$_POST['TenThuoc'],
							$_POST['DVTinh'],
							$_POST['DonGia'],
							$_POST['SoLuong']
						);
						if($kq){
							echo"<div class='col-md-12' style ='padding:0;' >";
								echo"<div class='alert alert-success' role='alert'>";
									echo $kq;
								echo"</div>";
							echo"</div>";
							$result=$query->insert_log($data['MaNV'],$data['HoTen'],"sửa thuốc",$get['TenThuoc']);
							$get = $db->get_row_thongtinthuoc($id);
						}

					}

				?>
				<form method="POST" role="form">
					<div class="form-group">
						<label for="">Tên Thuốc: </label>
						<input type="text" class="form-control" placeholder="Nhập Tên Thuốc" name="TenThuoc" value="<?php echo $get['TenThuoc']?>">
					</div>
					<div class="form-group">
						<label for="">Đơn Vị Tính: </label>
						<input type="text" class="form-control" placeholder="Vỉ,Viên,Lọ..." name="DVTinh" value="<?php echo $get['DonViTinh']?>">
					</div>
					<div class="form-group">
						<label for="">Đơn Giá: </label>
						<input type="text" class="form-control" placeholder="Nhập Đơn Giá" name="DonGia" value="<?php echo $get['DonGia']?>">
					</div>
					<div class="form-group">
						<label for="">Số Lượng: </label>
						<input type="text" class="form-control" placeholder="Nhập Số Lượng" name="SoLuong" value="<?php echo $get['SoLuong']?>">
					</div>
					<button type="submit" class="btn btn-primary center-block"  name ="CapNhat">Cập nhật</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>