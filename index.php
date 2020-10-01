<?php
	require_once("header.php")
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container" style=" margin-top:10px;">
		<div class="col-md-12">
			<div class="col-md-12 text-center text-primary">
				<h3>DANH SÁCH BỆNH NHÂN</h3>
			</div>
			<?php
				require_once"config/benhnhan.php";
				if(isset($_POST['delete']))
				{
				
					$id = $_POST['delete'];
					$db = new Benhnhan();
					$row = $db->lay_thongtin_dong($id);
					$delete = $db->delete_bn($id);
					if($delete==1)
					{
						echo"<div class='col-md-12' >";
							echo"<div class='alert alert-success' role='alert'>";
							echo"<p class='text-center'>Xóa Thành Công bệnh nhân $row[HoTenBN]</p>";
							echo"</div>";
						echo"</div>";
					}
				}
			?>
			<div class="col-md-12">
				<div class="col-md-6">
					<form class="navbar-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Tìm Kiếm bệnh nhân" id="search">
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<a href="thembenhnhan.php"><button type="submit" class="btn btn-info" style="float:right;">Thêm BN mới</button></a>	
				</div>
			</div>
			<!-------------THÔNG BÁO KHÔNG TÌM ĐƯỢC MÃ BỆNH NHÂN--------------->
			<div class="col-md-12 table-responsive" style="height:500px;">
				<table class="table table-bordered table-striped text-center">
					<header>
						<tr>
							<td>STT</td>
							<td>Mã Bệnh Nhân</td>
							
							<td>Họ Và Tên</td>
							<td>SĐT</td>
							<td>Giới Tính</td>
							<td>CMND</td>
							<td ></td>
							<td ></td>
							<td ></td>
							<td ></td>
						</tr>
					</header>
					<form method="POST" role="form">
						<tbody id="search-sdt">
							<?php
							require_once"config/benhnhan.php";
							$db= new Benhnhan();
							$data = $db->lay_thongtin();
							$i=1;
							foreach($data as $row)
							{
								if($row['TrangThai']==1){

									if($row['GioiTinh']==0)
									{
										$gioitinh="Nam";
									}
									else
									{
										$gioitinh="Nữ";
										
									}
									$mabn = $row['SDT'];
									echo"<tr>";
										echo"<td>$i</td>";
										echo"<td><svg style='margin-left: 25px;' id='barcode".$row['MaBN']."'></svg></td>";
										echo"<td>$row[HoTenBN]</td>";
										echo"<td>$row[SDT]</td>";
										echo"<td>$gioitinh</td>";
										echo"<td>$row[CMND]</td>";
										echo"<td><a href='khambenh1.php?id=$row[MaBN]'><button type='button' class='btn btn-info'>Khám bệnh</button></a></td>";
										echo"<td><a href='dothiluc.php?id=$row[MaBN]'><button type='button' class='btn btn-info'>Đo thị lực</button></a></td>";
										echo"<td><a href='fixbenhnhan.php?id=$row[MaBN]'><button type='button' class='btn btn-warning'>Sửa</button></a></td>";
										echo"<td><a href='lichsukhambenh.php?id=$row[MaBN]'><button type='button' class='btn btn-success'>Lịch sử khám</button></a></td>";
									echo"</tr>";
									$i++;

									echo"<script >
										JsBarcode('#barcode".$row['MaBN']."', '$row[MaBN]',{
										 width: 1,
										 height: 15});
										</script>";
								}
							}
							?>
						</tbody>
					</form>
				</table>
			</div>	
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$("#search").keyup(function() {
				var a = $(this).val();
				$.get("ajax/search_benhnhan.php",{timkiem:a},function(data){
					$("#search-sdt").html(data);
				});
			});			
		});
	</script>
	<!--------------------tìm kiếm bệnh nhân bằng số điện thoại ------------>
	<script>
		// $(document).ready(function() {
		// 	$("#search").keyup(function() {
		// 		var a = $(this).val();
		// 		$.get("ajax/search-sdt.php",{sdt:a},function(data){
		// 			$("#search-sdt").html(data);
		// 		});
		// 	});			
		// });		
	</script>
	<!--------------------tìm kiếm bệnh nhân bằng số CMND------------------->
	<script>
		// $(document).ready(function() {
		// 	$("#search").keyup(function() {
		// 		var a = $(this).val();
		// 		$.get("ajax/search-cmnd.php",{cmnd:a},function(data){
		// 			$("#search-cmnd").html(data);
		// 		});
		// 	});			
		// });		
	</script>
	<!--------------------tìm kiếm bệnh nhân bằng HỌ Tên------------------->
	<script>
		// $(document).ready(function() {
		// 	$("#search").keyup(function() {
		// 		var a = $(this).val();
		// 		$.get("ajax/search-tenbn.php",{tenbn:a},function(data){
		// 			$("#search-ten").html(data);
		// 		});
		// 	});			
		// });		
	</script>
	<!-- Footer -->
	<footer >
		<div class="footer-copyright text-center py-3">© 2020 Copyright:
			<a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
		</div>
		<!-- Copyright -->
	</footer>
	<!-- Footer -->
</body>
</html>