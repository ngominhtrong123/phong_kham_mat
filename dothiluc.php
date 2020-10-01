<?php 
	require_once("header.php");
	ob_start();
?>
	<div class="container">
		<div class="col-md-12 text-center">
			<h3 style="margin: 5px 0px 25px 0; color:#bd0103;">ĐO THỊ LỰC</h3>
		</div>
		<div class="col-md-12" style="padding: 0;">
			<?php 
				require_once "config/benhnhan.php";
				$get = new benhnhan();
				$data = $get->lay_thongtin_dong($_GET['id']);
				$id = $_GET['id'];
			?>
			<div class="col-md-2">
				<div class="form-group">
					<label>Mã Bệnh Nhân: </label>
					<span id="idbenhnhan"><?php echo $data['MaBN'] ?></span>	
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Tên Bệnh Nhân: </label>
					<span><?php echo $data['HoTenBN'] ?></span>	
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Ngày sinh: </label>
					<span><?php echo date("d-m-Y", strtotime($data['NamSinh'])); ?></span>	
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Giới tính: </label>
					<span>
						<?php
							if($data['GioiTinh'] == 0){
								echo "Nam";
							}else{
								echo "Nữ";
							}
						 ?>
					</span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Số điện thoại: </label>
					<span><?php echo $data['SDT'] ?></span>	
				</div>
			</div>
		</div>
		<form action="donkinh.php?id=<?php echo $_GET['id']; ?>" method="POST" role ="form">
			<div class="col-md-12">
				<div style=""> 
					<table class="table table-striped table-bordered text-center" style="">
						<thead style="font-size:17px;">
							<tr>
								<td rowspan="2">TL</td>
								<td colspan="3">kính điều chỉnh</td>
								<td rowspan="2" >VA ( thị lực )</td>
								<td rowspan="2" >ADD ( thêm )</td>
								<td rowspan="2" >KCĐT ( khoảng cách đồng tử )</td>
								<td rowspan="2" >KQĐK</td>
							</tr>
							<tr>
					            <td>SPH ( cầu )</td>
					            <td>CYL ( trụ )</td>
					          	<td>AXE ( trục )</td>
					        </tr>
						</thead>
							<tbody>
								<tr>
					            <td>MT</td>
					          	<td><input type="text" name="mt_sp" class="form-control"></td>
					          	<td><input type="text" name="mt_cy" class="form-control"></td>
					          	<td><input type="text" name="mt_axe" class="form-control"></td>
					            <td><input type="text" name="mt_va" class="form-control"></td>
					            <td><input type="text" name="mt_ad" class="form-control"></td>
					            <td><input type="text" name="mt_kc" class="form-control"></td>
					            <td><input type="text" name="mt_kq" class="form-control"></td>
					        </tr>
					        <tr>
					            <td>MP</td>
					          	<td><input type="text" name="mp_sp" class="form-control"></td>
					          	<td><input type="text" name="mp_cy" class="form-control"></td>
					          	<td><input type="text" name="mp_axe" class="form-control"></td>
					            <td><input type="text" name="mp_va" class="form-control"></td>
					            <td><input type="text" name="mp_ad" class="form-control"></td>
					            <td><input type="text" name="mp_kc" class="form-control"></td>
					            <td><input type="text" name="mp_kq" class="form-control"></td>
					        </tr>
							</tbody>
					</table>
				</div>	
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label"  >Loại tròng đề nghị: </label>
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-2" style="padding: 0;">
					<div class="form-group">
						<label class="control-label"  >đơn tròng: </label>
						<input type="checkbox" name="dontrong" >
					</div>
				</div>
				<div class="col-md-2" style="padding: 0;">
					<div class="form-group">
						<label class="control-label"  >hai tròng: </label>
						<input type="checkbox" name="haitrong" >
					</div>
				</div>
				<div class="col-md-2" style="padding: 0;">
					<div class="form-group">
						<label class="control-label"  >nhựa tổng hợp: </label>
						<input type="checkbox" name="nhuath" >
					</div>
				</div>
				<div class="col-md-2" style="padding: 0;">
					<div class="form-group">
						<label class="control-label"  >phân cực: </label>
						<input type="checkbox" name="phancuc" >
					</div>
				</div>
				<div class="col-md-2" style="padding: 0;">
					<div class="form-group">
						<label class="control-label"  >mắt màu: </label>
						<input type="checkbox" name="matmau" >
					</div>
				</div>
				<div class="col-md-2" style="padding: 0;">
					<div class="form-group">
						<label class="control-label"  >đổi màu: </label>
						<input type="checkbox" name="doimau" >
					</div>
				</div>
				<div class="col-md-2" style="padding: 0;">
					<div class="form-group">
						<label class="control-label"  >áp tròng: </label>
						<input type="checkbox" name="aptrong" >
					</div>
				</div>
				<div class="col-md-2" style="padding: 0;">
					<div class="form-group">
						<label class="control-label"  >không màu: </label>
						<input type="checkbox" name="khongmau" >
					</div>
				</div>
				<div class="col-md-2" style="padding: 0;">
					<div class="form-group">
						<label class="control-label"  >có màu: </label>
						<input type="checkbox" name="comau" >
					</div>
				</div>
				
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label" >Lợi dặn của bác sĩ: </label>
					<input type="text" name="ghichu" class="form-control" >
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label" >Ngày tái khám: </label>
					<input type="date" name="taikham" class="form-control" >
				</div>
			</div>
			<button name="xuat_donkinh" type="submit" class="center-block btn btn-success">Xuất Đơn kính</button>
		</form>
	</div>


	<!-----------SEARCH TÊN THUỐC------------>
<script>
	$(document).ready(function() {
		$("#search").keyup(function() {
			var a = $(this).val();
			var id = $('#idbenhnhan').text();
			$.get("ajax/search-kedon.php",{tenthuoc:a,idbenhnhan:id},function(data){
				$("#search-tenthuoc").html(data);
				$("#search-tenthuoc").fadeIn();
			});
		});	
	});
</script>
<!---------------------sear-donmau----------------->
<script>
	$(document).ready(function() {
		$("#search-donmau").keyup(function() {
			var b = $(this).val();
			var id = $('#idbenhnhan').text();
			$.get("ajax/search-donmau.php",{tenbenh:b,idbenhnhan:id},function(data){
				$("#search-tenbenh").html(data);
				$("#search-tenbenh").fadeIn();
			});
		});	
	});
</script>


<?php

echo '<script>';
echo "$.get('ajax/showtenthuoc.php',{tenthuoc:'werty',idbenhnhan:".$_GET['id']."},function(data){
		$('#show-tenthuoc').html(data);
		$('#search-tenthuoc').fadeOut();
	});	";
echo '</script>';



	if(isset($_POST['xoa']))
	{

		for($i=0;$i<count($_SESSION["donthuoc".$id]);$i++)
		{
			if($_SESSION["donthuoc".$id][$i]==$_POST['xoa'])
			{
				unset($_SESSION["donthuoc".$id][$i]);
			}
		}
	}



?>


	
