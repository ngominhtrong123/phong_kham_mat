<?php
	require_once"header.php";
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container-fluid" style=" margin-top:10px;">
		<div class="col-md-12">
			<div class="col-md-12 text-center text-primary">
				<h3>Thêm Loại Thuốc</h3>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php
					require_once"config/thuoc.php";
					if(isset($_POST['ThemThuoc']))
					{
						$db = new Thuoc();
						$kq=$db->themthuoc(
							$_POST['TenThuoc'],
							$_POST['DVTinh'],
							$_POST['DonGia'],
							$_POST['SoLuong'],
							$_POST['GiaNhap']);
					}

				?>
				<form method="POST" role="form">
					<div id="alert-tenthuoc" class="col-md-12 " style='padding:0;' role="alert">
					</div>
					<div class="form-group">
						<label for="">Tên Thuốc: </label>
						<input type="text" class="form-control" placeholder="Nhập Tên Thuốc" id="tenthuoc" name="TenThuoc">
					</div>
					<div class="form-group">
						<label for="">Đơn Vị Tính: </label>
						<input type="text" class="form-control" id="donvi" placeholder="Vỉ,Viên,Lọ..." name="DVTinh">
					</div>
					<div class="form-group">
						<label for="">Giá Nhập: </label>
						<input type="text" class="form-control" placeholder="Giá Nhập Thuốc" id="dongia" name="GiaNhap">
					</div>
					<div class="form-group">
						<label for="">Đơn Giá: </label>
						<input type="text" class="form-control" placeholder="Nhập Đơn Giá" id="dongia" name="DonGia">
					</div>
					<div class="form-group">
						<label for="">Số Lượng: </label>
						<input type="text" class="form-control" placeholder="Nhập Số Lượng" id="soluong" name="SoLuong">
					</div>
					<button type="submit" class="btn btn-primary"  name="ThemThuoc">Thêm</button>
				</form>
			</div>
		</div>
	</div>
<!--Kiểm tra tên thuốc đã có trong kho thuốc chưa-->
	<script>
		$(document).ready(function() {
			$("#tenthuoc").blur(function() {
				var a = $(this).val();
				// var donvi = $(this).val();
				// var dongia = $(this).val();
				// var soluong = $(this).val();
				$.get("ajax/kiemtra-tenthuoc.php",{tenthuoc:a},function(data){
					$("#alert-tenthuoc").html(data);
				});
			});			
		});		
	</script>	
</body>
</html>