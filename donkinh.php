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
					require"config/donkinh.php";
					$db = new Donkinh();
					if(isset($_POST['xuat_donkinh']))
					{
							$insert = $db->nhap_donkinh($_GET['id'],
								$_POST['ghichu'],
								$_POST['taikham'],
								$_POST['mt_sp'],
								$_POST['mt_cy'],
								$_POST['mt_axe'],
								$_POST['mt_va'],
								$_POST['mt_ad'],
								$_POST['mt_kc'],
								$_POST['mt_kq'],
								$_POST['mp_sp'],
								$_POST['mp_cy'],
								$_POST['mp_axe'],
								$_POST['mp_va'],
								$_POST['mp_ad'],
								$_POST['mp_kc'],
								$_POST['mp_kq']);
							$result = $db->get_donkinh($_GET['id']);
							echo "<h4>Mã HÓA ĐƠN:</h4>";
							echo" <svg id='barcode".$result['ID']."'></svg>";
							echo"<script >
									JsBarcode('#barcode".$result['ID']."', '$result[ID]',{
									width: 1,
									height: 15});
								</script>";	
					}
				?>
			</div>
		</div>
		<div class="col-md-12 text-center" >
			<h3><b>ĐƠN KÍNH</b></h3>
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
	<div class="col-md-12" >
			<div> 
				<table class="table table-striped table-bordered text-center" style="">
					<thead style="font-size:17px;">
						<tr>
							<td rowspan="2">TL</td>
							<td colspan="3">kính điều chỉnh</td>
							<td rowspan="2" >VA ( thị lực )</td>
							<td rowspan="2" >ADD ( thêm )</td>
							<td rowspan="2" >KCĐT </br>( khoảng cách đồng tử )</td>
							<td rowspan="2" >KQĐK</td>
						</tr>
						<tr>
				            <td>SPH ( cầu )</td>
				            <td>CYL ( trụ )</td>
				          	<td>AXE ( trục )</td>
				        </tr>
					</thead>
					<tbody>
						<?php
							echo"<tr>";
					            echo"<td>MT</td>";
					          	echo"<td>".$_POST['mt_sp']."</td>";
					          	echo"<td>".$_POST['mt_cy']."</td>";
					          	echo"<td>".$_POST['mt_axe']."</td>";
					            echo"<td>".$_POST['mt_va']."</td>";
					            echo"<td>".$_POST['mt_ad']."</td>";
					            echo"<td>".$_POST['mt_kc']."</td>";
					            echo"<td>".$_POST['mt_kq']."</td>";
					        echo"</tr>";
					        echo"<tr>";
					            echo"<td>MP</td>";
					          	echo"<td>".$_POST['mp_sp']."</td>";
					          	echo"<td>".$_POST['mp_cy']."</td>";
					          	echo"<td>".$_POST['mp_axe']."</td>";
					            echo"<td>".$_POST['mp_va']."</td>";
					            echo"<td>".$_POST['mp_ad']."</td>";
					            echo"<td>".$_POST['mp_kc']."</td>";
					            echo"<td>".$_POST['mp_kq']."</td>";
					        echo"</tr>";
						?>
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
			<?php
				if(isset($_POST['dontrong']))
				{
					$db = new Donkinh();
					$nhap = $db->nhap_chitiet_donkinh($result['ID'],$_GET['id'],"đơn tròng");
					echo"<div class='col-md-2' style='padding: 0;'>";
						echo"<div class='form-group'>";
							echo"<label class='control-label'  >đơn tròng </label>";
						echo"</div>";
					echo"</div>";
				}
				if(isset($_POST['aptrong']))
				{
					$db = new Donkinh();
					$nhap = $db->nhap_chitiet_donkinh($result['ID'],$_GET['id'],"áp tròng");
					echo"<div class='col-md-2' style='padding: 0;'>";
						echo"<div class='form-group'>";
							echo"<label class='control-label'  >áp tròng </label>";
						echo"</div>";
					echo"</div>";
				}
				if(isset($_POST['haitrong']))
				{
					$db = new Donkinh();
					$nhap = $db->nhap_chitiet_donkinh($result['ID'],$_GET['id'],"hai tròng");
					echo"<div class='col-md-2' style='padding: 0;'>";
						echo"<div class='form-group'>";
							echo"<label class='control-label'  >hai tròng </label>";
						echo"</div>";
					echo"</div>";
				}
				if(isset($_POST['phancuc']))
				{
					$db = new Donkinh();
					$nhap = $db->nhap_chitiet_donkinh($result['ID'],$_GET['id'],"phân cực");
					echo"<div class='col-md-2' style='padding: 0;'>";
						echo"<div class='form-group'>";
							echo"<label class='control-label'  >phân cực </label>";
						echo"</div>";
					echo"</div>";
				}
				if(isset($_POST['nhuath']))
				{
					$db = new Donkinh();
					$nhap = $db->nhap_chitiet_donkinh($result['ID'],$_GET['id'],"nhựa tổng hợp");
					echo"<div class='col-md-2' style='padding: 0;'>";
						echo"<div class='form-group'>";
							echo"<label class='control-label'  >nhựa tổng hợp </label>";
						echo"</div>";
					echo"</div>";
				}
				if(isset($_POST['matmau']))
				{
					$db = new Donkinh();
					$nhap = $db->nhap_chitiet_donkinh($result['ID'],$_GET['id'],"mắt màu");
					echo"<div class='col-md-2' style='padding: 0;'>";
						echo"<div class='form-group'>";
							echo"<label class='control-label'  >mắt màu </label>";
						echo"</div>";
					echo"</div>";
				}
				if(isset($_POST['doimau']))
				{
					$db = new Donkinh();
					$nhap = $db->nhap_chitiet_donkinh($result['ID'],$_GET['id'],"Đổi màu");
					echo"<div class='col-md-2' style='padding: 0;'>";
						echo"<div class='form-group'>";
							echo"<label class='control-label'  >đổi màu </label>";
						echo"</div>";
					echo"</div>";
				}
				if(isset($_POST['khongmau']))
				{
					$db = new Donkinh();
					$nhap = $db->nhap_chitiet_donkinh($result['ID'],$_GET['id'],"không màu");
					echo"<div class='col-md-2' style='padding: 0;'>";
						echo"<div class='form-group'>";
							echo"<label class='control-label'  >Không màu </label>";
						echo"</div>";
					echo"</div>";
				}
				if(isset($_POST['comau']))
				{
					$db = new Donkinh();
					$nhap = $db->nhap_chitiet_donkinh($result['ID'],$_GET['id'],"có màu");
					echo"<div class='col-md-2' style='padding: 0;'>";
						echo"<div class='form-group'>";
							echo"<label class='control-label'  >có màu </label>";
						echo"</div>";
					echo"</div>";
				}		
			?>
		</div>
		<div class="col-md-12">
			<label class="control-label"  ></label>
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

<!-- <script>
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script> -->
<!-- <script type="text/javascript">
window.print();
</script> -->