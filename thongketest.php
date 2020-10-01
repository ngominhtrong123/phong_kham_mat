<?php 
	require_once("header.php");
?>
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
</div>