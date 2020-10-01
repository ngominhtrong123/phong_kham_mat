<?php
	require_once"header.php";
?>

<div id="printableArea" >
      <div class="container">
	<div class="col-md-10 col-md-offset-1" style="border: 2px solid #ccc; float:left;">
		<div class="col-md-12" style="height:90px">
			<div class="col-sm-4 text-center" style="padding: 0;">
				<h4>PHÒNG KHÁM MẮT <br>MINH TRỌNG</h4>
			</div>
			
			<div class="col-sm-6 text-right" style="float: right;">
				<?php 
					require"config/donthuoc.php";
					$db = new Donthuoc();
					if(isset($_POST['xuat_donthuoc']))
					{
						if(isset($_POST['donmau'])){
							$insert = $db->nhap_donthuoc($_GET['id'],$_POST['chuandoan'],$_POST['ghichu'],1);
							$result = $db->get_donthuoc($_GET['id']);
							echo "<h4>Mã HÓA ĐƠN:</h4>";
							echo" <svg id='barcode".$result['ID']."'></svg>";
							echo"<script >
									JsBarcode('#barcode".$result['ID']."', '$result[ID]',{
									width: 1,
									height: 15});
								</script>";
						}
						else{
							$insert = $db->nhap_donthuoc($_GET['id'],$_POST['chuandoan'],$_POST['ghichu'],0);
							$result = $db->get_donthuoc($_GET['id']);
							echo "<h4>Mã HÓA ĐƠN:</h4>";
							echo" <svg id='barcode".$result['ID']."'></svg>";
							echo"<script >
									JsBarcode('#barcode".$result['ID']."', '$result[ID]',{
									width: 1,
									height: 15});
								</script>";
						}
						
					}
				?>
			</div>
		</div>
		<div class="col-md-12 text-center" >
			<h3><b>ĐƠN THUỐC</b></h3>
		</div>
		<?php 
			require_once "config/benhnhan.php";
			$id_benhnhan = $_GET['id'];
			$get = new Benhnhan();
			$data = $get->lay_thongtin_dong($id_benhnhan);
		?>
		<div class="col-md-12">
			<form class="form-horizontal" role="form">
				<div class="col-md-3 col-sm-3">
					<div class="form-group">
						<label>Họ Tên: </label>
						<span><?php echo $data['HoTenBN'] ?></span>	
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="form-group">
						<label>Ngày sinh: </label>
						<span><?php $date = $data['NamSinh']; echo date("d-m-Y", strtotime($date));  ?></span>	
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
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
				<div class="col-md-1 col-sm-1">
					<div class="form-group">
						<p style="font-weight: bold;">Mã BN:</p>
					</div>
				</div>
				<div class="col-md-2 col-sm-2">
					<div class="form-group" style='margin-top: -9px;'>
						<span >
							<?php echo"<svg id='barcode".$_GET['id']."'>";
								echo"<script >
									JsBarcode('#barcode".$_GET['id']."', '$_GET[id]',{
									width: 1,
									height: 15});
								</script>";
							?>	
						</span>	
					</div>
				</div>
				<div class="col-md-12 col-sm-12" style="padding: 0px;">
					<div class="col-md-6 col-sm-8">
						<div class="form-group">
							<label>Địa chỉ:</label>
							<span><?php echo $data['DiaChi'] ?></span>	
						</div>
					</div>
					<div class="col-md-6 col-sm-4">
						<div class="form-group">
							<label>Số Điện thoại:</label>
							<span><?php echo $data['SDT'] ?></span>	
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label>Chuẩn đoán: </label>
				<span><?php echo $_POST['chuandoan']; ?></span>	
			</div>
		</div>
	<div class="col-md-12" >
			<div> 
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
							$get = new Donthuoc();
							$data = $get->get_donthuoc($_GET['id']);
							$i=1;
							$tongtien=0;
							foreach($_SESSION['donthuoc'.$id_benhnhan] as $value)
							{
								$db = new Donthuoc();
								$result = $db->getrow_thuoc($value);
								$thanhtien = $result['DonGia']*$_POST['soluong'.$value];
								echo"<tr>";
									echo"<td>$i</td>";
									echo"<td>$result[TenThuoc]</td>";
									echo"<td>".$result['DonViTinh']."</td>";
									echo"<td>".$_POST['soluong'.$value]."</td>";
									echo"<td>".number_format($result['DonGia'])."</td>";
									echo"<td>".number_format($thanhtien)."</td>";
									echo"<td>".$_POST['cachdung'.$value]."</td>";
								echo"</tr>";
								$tongtien=$tongtien+$thanhtien;
								$i++;
								$update_soluong = $result['SoLuong']-$_POST['soluong'.$value];
								$insert = $db->nhapdonthuoc($data['ID'],$_GET['id'],$result['TenThuoc'],$result['DonViTinh'],$_POST['soluong'.$value],$result['DonGia'],$thanhtien,$_POST['cachdung'.$value]);
								$update = $db->update_sl($value,$update_soluong);
								$update_tongtien = $db->update_thanhtien($data['ID'],$id_benhnhan,$tongtien);

							}
							unset($_SESSION['donthuoc'.$id_benhnhan]);
							$giacuoi=$tongtien;
						?>
					</tbody>
				</table>
			</div>	
		</div>
		<div class="col-md-12 text-right" style="font-size: 17px;">
			<div class="form-group">
				<label>Tổng tiền: </label>
				<span style="color:#bd0103;"><b>
					<?php 
						if(isset($giacuoi)){
							echo number_format($giacuoi)."VNĐ"; 
						}else{
							echo "0";
						}
					?></b>

				</span>	
			</div>
		</div>
		<div class="col-md-12" >
			<div class="form-group">
				<label>Lời dặn của Bác Sĩ: </label>
				<span><?php echo $_POST['ghichu'] ?></span>	
			</div>
		</div>
		<div class="col-md-5" >
			<div class="form-group">
				<label>Ngày Tái Khám: </label>
				<span><?php echo date("d-m-Y", strtotime($_POST['taikham'])); ?></span>	
			</div>
		</div>
		<div class="col-md-7" style="float:right">
			<div class="col-md-5 col-md-offset-7 text-center">
				<div class="form-group">
					<label>
							<?php 

							echo "Ngày ".date("d")." Tháng ".date("m")." Năm ".date("Y") ;
							?>
						</label>
					<br/>
					<b>Bác sĩ điều trị</b>
					<br/>
					<br/>
					<br/>
					<br/>
					<b>Bs Ngô Minh Trọng</b>
				</div>
			</div>
		</div>
	</div>
</div>

	
</div>

<script>
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script type="text/javascript">
window.print();
</script>