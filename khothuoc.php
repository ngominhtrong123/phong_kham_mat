<?php
	require_once("header.php")
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container" style=" margin-top:10px;">
		<div class="col-md-12">
			<div class="col-md-12 text-center text-primary">
				<h3>KHO THUỐC</h3>
			</div>
			<div class="col-md-12">
				<form class="navbar-form">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Tìm Kiếm Tên Thuốc" id="search">
					</div>
				</form>
			</div>
			<!-------------THÔNG BÁO KHÔNG TÌM ĐƯỢC MÃ BỆNH NHÂN--------------->
			<div class="col-md-12" style="height:500px;">
				<div class="col-md-12 ">
					<div class="col-md-9"></div>
					<div class="col-md-3" style="padding: 0;">
						<a href="themloaithuoc.php"><button type="submit" class="btn btn-info" style="float:right;">Thêm Loại Thuốc mới</button></a>
					</div>
					<table class="table table-bordered table-striped text-center">
						<header>
							<tr>
								<td>STT</td>
								<td>Mã Thuốc</td>
								<td>Tên Thuốc</td>
								<td>Đơn Vị Tính</td>
								<td>Đơn Giá</td>
								<td>Số Lượng</td>
								<td></td>
							</tr>
						</header>
						<?php
								require_once"config/thuoc.php";
								require_once"config/taikhoan.php";
								$query = new Nguoisudung();
								$data = $query->getrow_taikhoan($_SESSION['username']);
								if(isset($_POST['delete']))
								{

									$db = new Thuoc();
									$kq = $db->get_row_thongtinthuoc($_POST['delete']);
									$result = $db->delete_thuoc($_POST['delete']);
									echo"<div class='col-md-12' style='padding:0;' >";
										echo"<div class='alert alert-danger' role='alert'>";
										echo"<p class='text-center'>Xóa Thành Công</p>";
										echo"</div>";
									echo"</div>";
									$result=$query->insert_log($data['MaNV'],$data['HoTen'],"xóa thuốc",$kq['TenThuoc']);
								}
							?>
						<form method="post" role = "form">
							<tbody id="search-sdt">
							
								<?php
									require_once"config/thuoc.php";
									$db= new Thuoc();
									$data = $db->lay_thongtinthuoc();
									$i=1;
									foreach($data as $row)
									{
										if($row['TrangThai']==1)
										{
											echo"<tr>";
												echo"<td>$i</td>";
												echo"<td>$row[id]</td>";
												echo"<td>$row[TenThuoc]</td>";
												echo"<td>$row[DonViTinh]</td>";
												echo"<td>$row[DonGia]</td>";
												if($row['SoLuong']<100)
												{
													if($row['SoLuong']==0){
														echo"<td class='danger'>$row[SoLuong] (thuốc trong kho đã hết)</td>";
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
													<a href='fixthuoc.php?id=$row[id]'><button type='button' class='btn btn-info'>Sửa</button></a>
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

	<!-- Footer -->

	<script>
		$(document).ready(function() {
			$("#search").keyup(function() {
				var a = $(this).val();
				$.get("ajax/search-tenthuoc.php",{tenthuoc:a},function(data){
					$("#search-sdt").html(data);
				});
			});			
		});		
	</script>
</body>
</html>