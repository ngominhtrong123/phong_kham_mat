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
					header("location:tkdaytoday.php?ngaybd=$ngaybd&ngaykt=$ngaykt");
				}	
		}
	?>
	<div class="col-md-12">
		<div class="col-md-12 text-center text-primary">
			<h3>THỐNG KÊ DOANH THU TỪ <?php echo date("d-m-Y", strtotime($_GET['ngaybd'])); echo" ĐẾN "; echo date("d-m-Y", strtotime($_GET['ngaykt'])); ?></h3>
		</div>
	<!-------bảng thống kê doanh thu tháng--------------->
		<div class="col-md-12 table-responsive" style="height:500px;">
			<table class="table table-bordered table-striped text-center" id="tblData">
				<header>
					<tr>
						<td>STT</td>
						<td>Ngày thống kê</td>
						<td>Số bệnh nhân</td>
						<td>Số đơn thuốc</td>
						<td>Tổng tiền</td>
						<td>Chi tiết</td>
					</tr>
				</header>
				<form method="POST" role="form">
					<tbody id="search-sdt">
						<?php
						require_once"config/testthongke.php";
						$db= new ThongKe();
						$data = $db->tkdaytoday($_GET['ngaybd'],$_GET['ngaykt']);
						$i=1;
						$doanhthu=0;
						$sobn =0;
						foreach($data as $row)
						{
								
								echo"<tr>";
									echo"<td>$i</td>";
									echo"<td>".date('d-m-Y', strtotime($row['ngay']))."</td>";
									echo"<td>$row[sobenhnhan]</td>";
									echo"<td>$row[sodon]</td>";
									echo"<td>$row[tongtien]</td>";
									echo"<td><a href='thongkengay.php?ngay=$row[day]&thang=$row[thang]'><button type='button' class='btn btn-warning'>xem chi tiết</button></a></td>";
								echo"</tr>";
								$i++;
								$doanhthu = $doanhthu+$row['tongtien'];
								$sobn = $sobn+$row['sobenhnhan'];
						}
						?>
					</tbody>
				</form>
			</table>
			<div class="col-md-3 col-sm-3">
				<div class="form-group">
					<label>Tổng doanh thu: </label>
					<span style="color:#bd0103;"><?php echo number_format($doanhthu)."VNĐ";   ?></span>	
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="form-group">
					<label>Tổng số bệnh nhân: </label>
					<span style="color:#bd0103;"><?php echo "$sobn bệnh nhân";   ?></span>	
				</div>
			</div>
		
		</div>
	</div>
</div>
<!-- <div class="row">
			<?php
				require_once"config/testthongke.php";
				$db= new ThongKe();
				$data = $db->tkdaytoday($_GET['ngaybd'],$_GET['ngaykt']);
				$i=1;
				foreach($data as $row)
				{
								
					echo"<div class='col-xs-3 col-md-3 text-center'>
					    <a href='thongkengay.php?ngay=$row[day]&thang=$row[thang]' class='thumbnail' id='ngay' >
					      <p> ".date('d-m-Y', strtotime($row['ngay']))." </p>
					      <p>Tổng tiền: $row[tongtien] VND</p>
					    </a>
				  </div>";
				}
				?>
		</div>	 -->