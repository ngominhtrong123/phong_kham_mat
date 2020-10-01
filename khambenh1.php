<?php 
	require_once("header.php");
	ob_start();
?>
	<div class="container">
		<div class="col-md-12 text-center">
			<h3 style="margin: 5px 0px 25px 0; color:#bd0103;">KHÁM BỆNH</h3>
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
		<form action="xuatdonthuoc.php?id=<?php echo $_GET['id']; ?>" method="POST" role ="form">
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label" >Chuẩn đoán: </label>
					<input type="text" name="chuandoan" class="form-control" placeholder="Chuẩn đoán lâm sàn, tên bệnh..." id="search-donmau" autocomplete="off">
				</div>
				<div class="col-md-12" style="padding:0;position:relative;margin-top: -15px;">
					<div class="list-group" id="search-tenbenh">
					</div>
				</div>
			</div>
			<div class="col-md-12" >
				<div class="col-md-12" style="padding:0;">
					<div class="form-group">
						<label class="control-label" >Kê đơn thuốc</label>
						<input id="search" type="text" class="form-control" placeholder="Search tên thuốc..." name="tenthuoc" autocomplete="off">
					</div>
				</div>
				<div class="col-md-12" style="padding:0;position:relative;margin-top: -15px;">
					<div class="list-group" id="search-tenthuoc">
					</div>
				</div>
				<div >
					<ul id="thuocList" class="list-unstyled" style="cursor:pointer; background-color:#ccc; ">
						
					</ul>	
				</div>
			</div>
			<div class="col-md-12">
				<div style="overflow:scroll;"> 
					<table class="table table-striped table-bordered text-center" style="">
						<thead style="font-size:17px;">
							<tr>
								<td>STT</td>
								<td>Tên Thuốc</td>
								<td style="width: 7%;">Đơn Vị</td>
								<td style="width: 7%;">SL</td>
								<td style="width: 10%;">Đơn giá</td>
								<td style="width: 12%;">Thành tiền</td>
								<td>Cách dùng</td>
								<td></td>
							</tr>
						</thead>
							<tbody id="show-tenthuoc">
								
							</tbody>
					</table>
				</div>	
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label" >Lợi dặn của bác sĩ: </label>
					<input type="text" name="ghichu" class="form-control" placeholder="Uống thuốc đúng giờ...">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label" >Ngày tái khám: </label>
					<input type="date" name="taikham" class="form-control" >
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label"  >chọn làm đơn thuốc mẫu: </label>
					<input type="checkbox" name="donmau" >
				</div>
			</div>
			<button name="xuat_donthuoc" type="submit" class="center-block btn btn-success">Xuất Đơn Thuốc</button>
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


	
