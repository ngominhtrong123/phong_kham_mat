<?php
	require_once("header.php")
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container-fluid" style=" margin-top:10px;">
		<div class="col-md-3">
			<div class="list-group">
				<a href="#" class="list-group-item list-group-item-action">
					Thêm Mới Bệnh Nhân
				</a>
				<a href="danhsachbenhnhan.php" class="list-group-item list-group-item-action active">Danh Sách Bệnh Nhân</a>
				<a href="#" class="list-group-item list-group-item-action ">Khám Bệnh</a>
				<a href="#" class="list-group-item list-group-item-action">Quản Lý Tên Bệnh</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Quản Lý Tên Thuốc</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Quản Lý Dịch Vụ</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Thống Kê Thuốc</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Thống Kê Vật Tư</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Thống Kê Bệnh Nhân</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Thống Kê Doanh Thu</a>
			</div>
		</div>
		<div class="col-md-9">
			<div class="col-md-12 text-center text-primary">
				<h3>DANH SÁCH BỆNH NHÂN</h3>
			</div>
			<?php
				require_once"config/benhnhan.php";
				if(isset($_POST['delete']))
				{
					$id = $_POST['delete'];
					$db = new Benhnhan();
					$delete = $db->delete_bn($id);
					echo"<div class='col-md-3' >";
						echo"<div class='alert alert-danger' role='alert'>";
						echo"<p class='text-center'>Xóa Thành Công</p>";
						echo"</div>";
					echo"</div>";
				}
			?>
			<div class="col-md-12">
				<form class="navbar-form">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Tìm Kiếm bệnh nhân" id="search">
					</div>
				</form>
			</div>
			<!-------------THÔNG BÁO KHÔNG TÌM ĐƯỢC MÃ BỆNH NHÂN--------------->
			<div class="col-md-12" style="height:500px; overflow:auto; ">
				<div class="col-md-12 ">
					<div class="col-md-9">
					</div>
					<div class="col-md-3" style="padding: 0;">
						<a href="thembenhnhan.php"><button type="submit" class="btn btn-info" style="float:right;">Thêm BN mới</button></a>	
					</div>
					<table class="table table-bordered table-striped text-center">
						<header>
							<tr>
								<td>STT</td>
								<td>Mã Bệnh Nhân</td>
								<td>Họ Và Tên</td>
								<td>SĐT</td>
								<td>Giới Tính</td>
								<td>CMND</td>
								<td></td>
							</tr>
						</header>
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
										echo"<tr>";
											echo"<td>$i</td>";
											echo"<td>$row[MaBN]</td>";
											echo"<td>$row[HoTenBN]</td>";
											echo"<td>$row[SDT]</td>";
											echo"<td>$gioitinh</td>";
											echo"<td>$row[CMND]</td>";
											echo"
											<form method = 'POST'>
												<td style='padding: 0;'><a href='khambenh.php?id=$row[MaBN]'><button type='submit' class='btn btn-info'>Khám bệnh</button></a>
													<a href='fixbenhnhan.php?id=$row[MaBN]'><button type='submit' class='btn btn-info'>Sửa</button></a>
													<button type='submit' class='btn btn-danger' name='delete' value='$row[MaBN]'>Xóa</button>
													</td>
											</from>";
										echo"</tr>";
										$i++;
									}	
								}
							?>
						</tbody>
					</table>
				</div>	
			</div>	
		</div>
	</div>
	<!--------------------tìm kiếm bệnh nhân bằng số điện thoại ------------>
	<script>
		$(document).ready(function() {
			$("#search").keyup(function() {
				var a = $(this).val();
				$.get("ajax/search-sdt.php",{sdt:a},function(data){
					$("#search-sdt").html(data);
				});
			});			
		});		
	</script>
	<!--------------------tìm kiếm bệnh nhân bằng số CMND------------------->
	<script>
		$(document).ready(function() {
			$("#search").keyup(function() {
				var a = $(this).val();
				$.get("ajax/search-cmnd.php",{cmnd:a},function(data){
					$("#search-sdt").html(data);
				});
			});			
		});		
	</script>
	<!--------------------tìm kiếm bệnh nhân bằng HỌ Tên------------------->
	<script>
		$(document).ready(function() {
			$("#search").keyup(function() {
				var a = $(this).val();
				$.get("ajax/search-tenbn.php",{tenbn:a},function(data){
					$("#search-sdt").html(data);
				});
			});			
		});		
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