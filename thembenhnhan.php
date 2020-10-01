<?php
	require_once"header.php";
?>
<div class="container-fluid" style=" margin-top:10px;">
	<div class="col-md-12">
		<div class="col-md-12 text-center text-primary">
			<h3 style="margin-top: 0; margin-bottom: 20px;">THÊM BỆNH NHÂN MỚI</h3>
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
		if(isset($_POST['ThemBN']))
		{
			$db = new Benhnhan();
			$kq=$db->thembenhnhan($_POST['SDT'],$_POST['TenBN'],$_POST['NgaySinh'],$_POST['CMND'],$_POST['DiaChi'],$_POST['GioiTinh'],'1');
			$result=$query->insert_log($data['MaNV'],$data['HoTen'],"Thêm Bệnh nhân mới",$_POST['TenBN']);
		}

		?>
		<form role="form" method='POST'>
			<div id="alert-sdt" class="col-md-12 " role="alert">
				
			</div>
			<div class="col-md-12" style="padding:0;">
				<div class="col-md-4">
					<div class="form-group">
						<label>Họ Và Tên</label>
						<input type="text" class="form-control" placeholder="Họ và tên" name="TenBN" required autofocus>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Ngày Sinh</label>
						<input type="date" class="form-control" placeholder="dd/mm/yyyy" name="NgaySinh" required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Giới Tính</label>
						<select class="form-control" name="GioiTinh">
							<option value="0">Nam</option>
							<option value="1">Nữ</option>
						</select>
					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<label>Địa Chỉ</label>
						<input type="text" class="form-control" name="DiaChi" required >
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Số điện thoại</label>
						<input id="sodienthoai" type="text" class="form-control" name="SDT" required >
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Số CMND</label>
						<input type="text" class="form-control" name="CMND" required>
					</div>
				</div>
			</div>
			<div class="col-md-12 text-center">
				<button type="submit" class="btn btn-info" name='ThemBN'>Thêm bệnh nhân</button>
			</div>
		</form>
	</div>
</div>
<!--KIỂM TRA SỐ ĐIỆN THOẠI CỦA KHÁCH HÀNG ĐÃ CÓ TRONG CƠ SỞ DỮ LIỆU HAY CHƯA-->
	<script>
		$(document).ready(function() {
			$("#sodienthoai").blur(function() {
				var a = $(this).val();
				$.get("ajax/kiemtra-sdt.php",{sdt:a},function(data){
					$("#alert-sdt").html(data);
				});
			});			
		});		
	</script>