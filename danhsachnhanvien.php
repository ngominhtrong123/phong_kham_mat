<?php
	require_once("header.php")
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container" style=" margin-top:10px;">
		<div class="col-md-12">
			<div class="col-md-12 text-center text-primary">
				<h3>Danh sách người dùng</h3>
			</div>
			<div class="col-md-12">
				<form class="navbar-form">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search người dùng" id="search">
					</div>
				</form>
			</div>
			<!-------------THÔNG BÁO KHÔNG TÌM ĐƯỢC MÃ BỆNH NHÂN--------------->
			<div class="col-md-12" style="height:500px;">
				<div class="col-md-12 ">
					<div class="col-md-9"></div>
					<div class="col-md-3" style="padding: 0;">
						<a href="themtaikhoan.php"><button type="submit" class="btn btn-info" style="float:right;">Thêm người dùng</button></a>
					</div>
					<table class="table table-bordered table-striped text-center">
						<header>
							<tr>
								<td>STT</td>
								<td>Mã nhân viên</td>
								<td>Họ tên</td>
								<td>SDT</td>
								<td>Vị trí</td>
								<td>Tài Khoản</td>
								<td></td>
							</tr>
						</header>
						<?php
								require_once"config/taikhoan.php";
								$query = new Nguoisudung();
								$data = $query->getrow_taikhoan($_SESSION['username']);
								if(isset($_POST['delete']))
								{

									$db = new Nguoisudung();
									$kq = $db->get_row_taikhoan($_POST['delete']);
									$result = $db->delete_nguoidung($_POST['delete']);
									echo"<div class='col-md-12 text-center' style='padding:0;' >";
										echo"<div class='alert alert-success' role='alert'>";
										echo"<p class=''>Xóa Thành Công người dùng </p>";
										echo $kq['HoTen'];
										echo"</div>";
									echo"</div>";
									$result=$query->insert_log($data['MaNV'],$data['HoTen'],"xóa người dùng",$kq['HoTen']);
								}
							?>
						<form method="post" role = "form">
							<tbody id="search-vattu">
							
								<?php
									require_once"config/taikhoan.php";
									$db= new Nguoisudung();
									$data = $db->get_data_nguoidung();
									$i=1;
									foreach($data as $row)
									{
										if($row['TrangThai']==1)
										{
											echo"<tr>";
												echo"<td>$i</td>";
												echo"<td>$row[MaNV]</td>";
												echo"<td>$row[HoTen]</td>";
												echo"<td>$row[SDT]</td>";
												echo"<td>$row[ViTri]</td>";
												echo"<td>$row[UserName]</td>";
												echo"
												<td style='padding: 0;'>
													<a href='fixnhanvien.php?id=$row[MaNV]'><button type='button' class='btn btn-info'>Sửa</button></a>
													<button type='submit' class='btn btn-danger' name='delete' value='$row[MaNV]'>Xóa</button>
													</td>";
											echo"</tr>";
											$i++;
										}
									}
								?>
							</tbody>
						</form>
					</table>
				</div>	
			</div>
			<!-----------------KẾT THÚC GIAO DIỆN KHÁM BỆNH--------------->
	
				</div>	
		</div>
	</div>
	<!-- Footer -->
	

	<script>
		$(document).ready(function() {
			$("#search").keyup(function() {
				var a = $(this).val();
				$.get("ajax/search-tenvattu.php",{tenvattu:a},function(data){
					$("#search-vattu").html(data);
				});
			});			
		});		
	</script>
</body>
</html>