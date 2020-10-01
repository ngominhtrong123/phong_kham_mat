<?php
	require_once"header.php";
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container-fluid" style=" margin-top:10px;">
		<div class="col-md-12">
			<div class="col-md-12 text-center text-primary">
				<h3>Sửa Thông Tin Vật Tư</h3>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php
					require_once"config/vattu.php";
					require_once"config/taikhoan.php";
					$query = new Nguoisudung();
					$data = $query->getrow_taikhoan($_SESSION['username']);
					$id = $_GET['id'];
					$db = new Vattu();
					$get = $db->get_row_vattu($id);
					if(isset($_POST['CapNhat']))
					{
						$kq=$db->fix_vattu(
							$id,
							$_POST['Tenvattu'],
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
							$result=$query->insert_log($data['MaNV'],$data['HoTen'],"sửa vật tư",$get['TenVatTu']);
							$get = $db->get_row_vattu($id);
						}

					}

				?>
				<form method="POST" role="form">
					<div class="form-group">
						<label for="">Tên Vật Tư: </label>
						<input type="text" class="form-control" placeholder="Nhập Tên Vật Tư" name="Tenvattu" value="<?php echo $get['TenVatTu']?>">
					</div>
					<div class="form-group">
						<label for="">Đơn Vị Tính: </label>
						<input type="text" class="form-control" placeholder="thùng,chiếc,cái..." name="DVTinh" value="<?php echo $get['DonViTinh']?>">
					</div>
					<div class="form-group">
						<label for="">Đơn Giá: </label>
						<input type="text" class="form-control" placeholder="Nhập Đơn Giá" name="DonGia" value="<?php echo $get['GiaBan']?>">
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