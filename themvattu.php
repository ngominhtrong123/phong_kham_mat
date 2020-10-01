<?php
	require_once"header.php";
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container-fluid" style=" margin-top:10px;">
		<div class="col-md-12">
			<div class="col-md-12 text-center text-primary">
				<h3>Thêm Vật Tư Mới</h3>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php
					require_once"config/vattu.php";
					if(isset($_POST['themvattu']))
					{
						$db = new Vattu();
						$kq=$db->themvattu(
							$_POST['tenvattu'],
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
						<label for="">Tên Vật TƯ: </label>
						<input type="text" class="form-control" placeholder="Nhập Tên Vật Tư" id="TenVatTu" name="tenvattu">
					</div>
					<div class="form-group">
						<label for="">Đơn Vị Tính: </label>
						<input type="text" class="form-control" id="donvi" placeholder="chiếc,cái,.." name="DVTinh">
					</div>
					<div class="form-group">
						<label for="">Giá Nhập: </label>
						<input type="text" class="form-control" placeholder="Giá Nhập" id="dongia" name="GiaNhap">
					</div>
					<div class="form-group">
						<label for="">Giá Bán: </label>
						<input type="text" class="form-control" placeholder="Nhập Đơn Giá" id="dongia" name="DonGia">
					</div>
					<div class="form-group">
						<label for="">Số Lượng: </label>
						<input type="text" class="form-control" placeholder="Nhập Số Lượng" id="soluong" name="SoLuong">
					</div>
					<button type="submit" class="btn btn-primary"  name="themvattu">Thêm</button>
				</form>
			</div>
		</div>
	</div>
<!--Kiểm tra tên thuốc đã có trong kho thuốc chưa-->
	<!-- <script>
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
	</script> -->	
</body>
</html>