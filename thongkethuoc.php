<?php 
	require_once("header.php");
?>
<style type="text/css">
	#ngay:hover{background: #FF0000;}
	#ngay{
		background:#AFEEEE;
		color: #191970;
		text-decoration: none;
	}
</style>
	<!--------------MAIN DSACH KH------------------>
<div class="container">
	<div class="col-md-12" style="">
		<form method="POST" role="form">
			<div class="col-md-12" style="padding:0;">
				<div class="col-md-3">
					<div class="form-group">
						<label>Ngày bắt đầu</label>
						<input type="date" class="form-control" placeholder="dd/mm/yyyy" name="ngaybd" >
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Ngày kết thúc</label>
						<input type="date" class="form-control" placeholder="dd/mm/yyyy" name="ngaykt" >
					</div>
				</div>
				<div class="col-md-2">
				<div class="form-group">
					<label>Xem thống kê</label>
					<button type="submit" class="btn btn-success" name='kiemtra'>kiểm tra</button>
				</div>
				</div>
			</div>
		</form>
	</div>
	<?php
		if(isset($_POST['kiemtra']))
		{
				
				if(isset($_POST['ngaybd'])&&isset($_POST['ngaykt']))
				{	
					$ngaybd=$_POST['ngaybd'];
					$ngaykt=$_POST['ngaykt'];
					header("location:thongkethuoc.php?ngaybd=$ngaybd&ngaykt=$ngaykt");
				}	
		}
	?>
	<div class="col-md-12">
		<div class="col-md-12 text-center text-primary">
			<h3>BÁO CÁO TỔNG SỐ LƯỢNG THUỐC ĐÃ XUẤT TỪ <?php echo date("d-m-Y", strtotime($_GET['ngaybd'])); echo" ĐẾN "; echo date("d-m-Y", strtotime($_GET['ngaykt'])); ?></h3>
		</div>
	<!-------bảng thống kê doanh tHUỐC--------------->
		<div class="col-md-12 table-responsive" style="height:500px;">
			<table class="table table-bordered table-striped text-center" id="tblData">
				<header>
					<tr>
						<td>STT</td>
						<td>Tên thuốc</td>
						<td>Số lượng Xuất</td>
						<td>Đơn vị</td>
					</tr>
				</header>
				<form method="POST" role="form">
					<tbody id="search-sdt">
						<?php
						require_once"config/testthongke.php";
						$db= new ThongKe();
						$data = $db->thongke_thuoc($_GET['ngaybd'],$_GET['ngaykt']);
						$i=1;
						foreach($data as $row)
						{
								
								echo"<tr>";
									echo"<td>$i</td>";
									echo"<td>$row[TenThuoc]</td>";
									echo"<td>$row[soluong]</td>";
									echo"<td>$row[DonVi]</td>";
								echo"</tr>";
								$i++;
						}
						?>
					</tbody>
				</form>
			</table>
			
		
		</div>
	</div>
</div>
<!-- <div class="row">
			
		</div>	 -->