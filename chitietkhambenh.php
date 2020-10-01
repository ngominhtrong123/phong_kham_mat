<?php 
	require_once("header.php");
?>
	<?php  
		require "config/donthuoc.php";
		$nhap = new DonThuoc();
		$data_khambenh = $nhap->get_row_khambenh($_GET['ID']);
		$data_benhnhan = $nhap->getrow_benhnhan($_GET['id']);
	?>
	<div class="container">
		<div class="col-md-10 col-md-offset-1" style="border: 2px solid #ccc;">
			<div class="col-md-12">
				<div class="col-md-3 text-center" style="padding: 0;">
					<h4>PHÒNG KHÁM ĐA KHOA MINH TRỌNG</h4>
				</div>
				<div class="col-md-3 col-md-offset-6 text-right">
					<h4>Mã hoá đơn: <?php echo $_GET['ID']?></h4>
				</div>
			</div>
			<div class="col-md-12 text-center" >
				<h3><b>ĐƠN THUỐC</b></h3>
			</div>
			<div class="col-md-12">
				<form class="form-horizontal" role="form">
					<div class="col-md-4">
						<div class="form-group">
							<label>Tên Bệnh Nhân: </label>
							<span><?php echo $data_benhnhan['HoTenBN'] ?></span>	
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Ngày sinh: </label>
							<span><?php echo $data_benhnhan['NamSinh'] ?></span>	
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Giới tính: </label>
							<span>
								<?php
									if($data_benhnhan['GioiTinh'] == 0){
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
							<span><?php echo $data_benhnhan['SDT'] ?></span>	
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Chuẩn đoán: </label>
					<span><?php echo $data_khambenh['ChuanDoan'] ?></span>	
				</div>
			</div>
			<div class="col-md-12" >
				<div style="overflow:scroll;"> 
					<table class="table table-striped table-bordered text-center" style="">
						<thead style="font-size:17px;">
							<tr>
								<td>STT</td>
								<td>Tên Thuốc</td>
								<td>Đơn Vị</td>
								<td>Số Lượng</td>
								<td>Đơn giá</td>
								<td>Thành tiền</td>
								<td>Cách dùng</td>
							</tr>
						</thead>
						<tbody>
							<?php
								$data = $nhap->getdata_donthuoc($_GET['ID']);
								$stt=1;
								$tongtien = 0;
								foreach ($data as $value) {
									echo"<tr>";
										echo"<td>$stt</td>";
										echo"<td>$value[TenThuoc]</td>";
										echo"<td>$value[DonVi]</td>";
										echo"<td>$value[SoLuong]</td>";
										echo"<td>".number_format($value['DonGia'])."</td>";
										echo"<td>".number_format($value['ThanhTien'])."</td>";
										echo"<td>$value[CachDung]</td>";
										$tongtien = $tongtien+$value['ThanhTien'];
										$stt++;
									echo"</tr>";
								}
							?>
						</tbody>
					</table>
				</div>	
			</div>
			<div class="col-md-12 text-right" style="font-size: 17px;">
				<div class="form-group">
					<label>Tổng tiền: </label>
					<span style="color:#bd0103;"><b><?php echo number_format($tongtien); ?></b></span>	
				</div>
			</div>
			<div class="col-md-12" >
				<div class="form-group">
					<label>Lời dặn của Bác Sĩ: </label>
					<span><?php echo $data_khambenh['GhiChu'] ?></span>	
				</div>
				<div class="col-md-5" >
			
		</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-5 col-md-offset-7 text-center">
					<div class="form-group">
						<label>
							<?php 

							echo "Ngày ".date("d",strtotime($data_khambenh['NgayKeDon']))." Tháng ".date("m",strtotime($data_khambenh['NgayKeDon']))." Năm ".date("Y",strtotime($data_khambenh['NgayKeDon'])) ;
							?>
						</label>
						<br/>
						<b>Bác sĩ điều trị</b>
						<br/>
						<br/>
						<br/>
						<br/>
						<b>Bs Đặng Lê Phúc Thảo</b>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12" style="margin-top:15px;">
			<a href="chitietbenhnhan.php?id=<?php echo $_GET['id'];?>"><button name="submit" type="submit" class="center-block btn btn-success">Quay lại </button></a>
		</div>
	</div>
<?php 
	require_once("footer.php");
?>