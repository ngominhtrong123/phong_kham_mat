<?php 
	require_once("header.php");
?>
	<div class="container">
		<div class="col-md-12 text-center">
			<h3 style="margin: 5px 0 30px 0; color:#bd0103;">LỊCH SỬ KHÁM BỆNH CỦA BỆNH NHÂN</h3>
		</div>
		<div class="col-md-12">
			<?php 
				require_once "config/benhnhan.php";
				$get = new Benhnhan();
				$data = $get->lay_thongtin_dong($_GET['id']);
				if($data['GioiTinh']==0){
					$GioiTinh = 'Nam';
				}else{
					$GioiTinh = 'Nữ';
				}
			?>
			<div class="col-md-2">
				<div class="form-group">
					<label>Mã Bệnh Nhân</label>
					<p><?php echo $data['MaBN']; ?></p>	
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Họ và tên</label>
					<p><?php echo $data['HoTenBN']; ?></p>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Số điện thoại</label>
					<p><?php echo $data['SDT']; ?></p>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Ngày sinh</label>
					<p><?php echo $data['NamSinh']; ?></p>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Giới Tính</label>
					<p><?php echo $GioiTinh; ?></p>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Số CMND</label>
					<p><?php echo $data['CMND']; ?></p>
				</div>
			</div>
		</div>
		<!-----------------BẢNG TỔNG QUAN CHI TIẾT------------------->
		<div class="col-md-12" style="margin-top:15px;">
			<div style="height: 550px; overflow:scroll;"> 
				<table class="table table-striped table-bordered text-center" style="">
					<thead style="font-size:17px;">
						<tr>
							<td>STT</td>
							<td>Mã Khám Bệnh</td>
							<td>Chuẩn Đoán</td>
							<td>Lời Dặn Của BS</td>
							<td>Ngày Khám Bệnh</td>
							<td>Ngày Tái khám</td>
							<td>Giá Tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php 
							require_once "config/donthuoc.php";
							$get = new DonThuoc();
							$data = $get->get_data_khambenh($_GET['id']);
							$stt=1;
							foreach ($data as $value) {
								echo"<tr>";
									echo"<td>$stt</td>";
									echo"<td>$value[ID]</td>";
									echo"<td>$value[ChuanDoan]</td>";
									echo"<td>$value[GhiChu]</td>";
									echo"<td>$value[NgayKeDon]</td>";
									echo"<td>$value[TaiKham]</td>";
									echo"<td>".number_format($value['GiaCuoi'])."</td>";
									echo"<td><a href='chitietkhambenh.php?id=$_GET[id]&ID=$value[ID]'><button type='button' class='btn btn-info'>Xem Chi Tiết</button></a></td>";
								echo"</tr>";
								$stt++;
							}
						?>
					</tbody>
				</table>
			</div>	
		</div>
		<!----------- ĐƠN THUỐC ------------->
	</div>
<?php 
	require_once("footer.php");
?>