<?php
	require_once("header.php")
?>
<style type="text/css">
	#ngay:hover{background: #FF0000;}
	#ngay{
		background:#AFEEEE;
		color: #191970;
		text-decoration: none;
	}
</style>
<!---------------------------------MAIN-------------------------------------->
<div class="container" style=" margin-top:10px;">
	<div class="col-md-12" style="">
		<form method="POST" role="form">
				<div class="col-md-12" style="padding:0;">
				<div class="col-md-2">
					<div class="form-group">
						<label>Thống kê theo</label>
						<select name="thongke" class="form-control" >
							<option value='ngay'>ngày</option>
							<option value='thang'>tháng</option>
							<option value='nam'>Năm</option>
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label> Chọn năm thống kê </label>
						<select name="year" class="form-control" >
							<?php 
								for($i=2020; $i>=2010; $i--){
									echo "<option >$i</option>";
								}
							?>
							
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label> Chọn tháng thống kê </label>
						<select name="month" class="form-control" >
							<?php 
								for($j=1; $j<=12; $j++){
									echo "<option >$j</option>";
								}
							?>	
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label>Ngày bắt đầu</label>
						<input type="date" class="form-control" placeholder="dd/mm/yyyy" name="ngaybd" >
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label>Ngày kết thúc</label>
						<input type="date" class="form-control" placeholder="dd/mm/yyyy" name="ngaykt" >
					</div>
				</div>
				<div class="col-md-2 ">
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
			if($_POST['thongke']=='nam')
			{	
				if(isset($_POST['year']))
				{	
					$year=$_POST['year'];
					header("location:thongkenam.php?nam=$year");
				}	
			}
			if($_POST['thongke']=='thang')
			{	
				if(isset($_POST['year'])&&isset($_POST['month']))
				{	
					$year=$_POST['year'];
					$month=$_POST['month'];
					header("location:testthongke.php?nam=$year&thang=$month");
				}	
			}
			if($_POST['thongke']=='ngay')
			{	
				if(isset($_POST['ngaybd'])&&isset($_POST['ngaykt']))
				{	
					$ngaybd=$_POST['ngaybd'];
					$ngaykt=$_POST['ngaykt'];
					header("location:tkdaytoday.php?ngaybd=$ngaybd&ngaykt=$ngaykt");
				}	
			}
		}
	?>
	<div class="col-md-12">
		<div class="col-md-12 text-center text-primary">
			<h3>THỐNG KÊ DOANH THU THÁNG <?php echo $_GET['thang']." NĂM ". $_GET['nam'] ?></h3>
		</div>
	<!-------bảng thống kê doanh thu tháng--------------->
						<?php
						require_once"config/testthongke.php";
						$db= new ThongKe();
						$thang = '0'.$_GET['thang'];
						$data = $db->thongkethang($thang, $_GET['nam']);
						$i=1;
						foreach($data as $row)
						{
								
								
								echo"<div class='col-xs-3 col-md-3 text-center'>
									    <a href='thongkengay.php?ngay=$row[Ngay]&thang=$thang' class='thumbnail' id='ngay' >
									      <p>Ngày $row[Ngay]</p>
									      <p>Tổng tiền: $row[TongTien] VND</p>
									    </a>
								  	</div>";
						}
						?>
				
	</div>
</div>