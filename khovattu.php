<?php
	require_once("header.php")
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container" style=" margin-top:10px;">
		<div class="col-md-12">
			<div class="col-md-12 text-center text-primary">
				<h3>KHO VẬT TƯ</h3>
			</div>
			<div class="col-md-12">
				<form class="navbar-form">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search Tên vật tư" id="search">
					</div>
				</form>
			</div>
			<!-------------THÔNG BÁO KHÔNG TÌM ĐƯỢC MÃ BỆNH NHÂN--------------->
			<div class="col-md-12" style="height:500px;">
				<div class="col-md-12 ">
					<div class="col-md-9"></div>
					<div class="col-md-3" style="padding: 0;">
						<a href="themvattu.php"><button type="submit" class="btn btn-info" style="float:right;">Thêm Vật Tư</button></a>
					</div>
					<table class="table table-bordered table-striped text-center">
						<header>
							<tr>
								<td>STT</td>
								<td>Mã vật tư</td>
								<td>Tên vật tư</td>
								<td>Đơn Vị Tính</td>
								<td>Đơn Giá</td>
								<td>Số Lượng</td>
								<td></td>
							</tr>
						</header>
						<?php
								require_once"config/vattu.php";
								require_once"config/taikhoan.php";
								$query = new Nguoisudung();
								$data = $query->getrow_taikhoan($_SESSION['username']);
								if(isset($_POST['delete']))
								{

									$db = new Vattu();
									$kq = $db->get_row_vattu($_POST['delete']);
									$result = $db->delete_vattu($_POST['delete']);
									echo"<div class='col-md-12' style='padding:0;' >";
										echo"<div class='alert alert-danger' role='alert'>";
										echo"<p class='text-center'>Xóa Thành Công</p>";
										echo"</div>";
									echo"</div>";
									$result=$query->insert_log($data['MaNV'],$data['HoTen'],"xóa vật tư",$kq['TenVatTu']);
								}
							?>
						<form method="post" role = "form">
							<tbody id="search-vattu">
							
								<?php
									require_once"config/thuoc.php";
									$db= new Vattu();
									$data = $db->get_data_vattu();
									$i=1;
									foreach($data as $row)
									{
										if($row['TrangThai']==1)
										{
											echo"<tr>";
												echo"<td>$i</td>";
												echo"<td>$row[id]</td>";
												echo"<td>$row[TenVatTu]</td>";
												echo"<td>$row[DonViTinh]</td>";
												echo"<td>$row[GiaBan]</td>";
												if($row['SoLuong']<100)
												{
													if($row['SoLuong']==0){
														echo"<td class='danger'>$row[SoLuong] (vật tư trong kho đã hết)</td>";
													}
													else
													{
														echo"<td class='danger'>$row[SoLuong]</td>";
													}
												}
												else
												{
													echo"<td>$row[SoLuong]</td>";
												}
												echo"
												<td style='padding: 0;'>
													<a href='fixvattu.php?id=$row[id]'><button type='button' class='btn btn-info'>Sửa</button></a>
													<button type='submit' class='btn btn-danger' name='delete' value='$row[id]'>Xóa</button>
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
	<footer >
		<div class="footer-copyright text-center py-3">© 2020 Copyright:
			<a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
		</div>
		<!-- Copyright -->
	</footer>
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