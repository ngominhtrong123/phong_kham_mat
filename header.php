<?php
	ob_start();
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:dangnhap.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Phòng Khám Minh Trọng</title>
	<script src="jquery/jquery.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" ></script>
	<script type="text/javascript" src="qrcode/qrcode.min.js"></script>
	<script type="text/javascript" src="qrcode/JsBarcode.all.min.js"></script>

	<script src="highcharts/code/highcharts.js"></script>
	<script src="highcharts/code/modules/data.js"></script>
	<script src="highcharts/code/modules/drilldown.js"></script>
	<script src="highcharts/code/modules/exporting.js"></script>
	<script src="highcharts/code/modules/export-data.js"></script>
	<script src="highcharts/code/modules/accessibility.js"></script>
	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/style.css">
	<link rel="stylesheet" href="font/css/all.css">

</head>
<body>
	<!------------------------MENU----------------------------------->
<header>
	<div class="container-fluid" style="padding: 0;">
		<nav class="navbar navbar-inverse" style="border-radius: 0;">
			<div class="container-fluid">
				<!-- mobile -->
				<div class="navbar-header">
								<a class='bootstrap1' href="index.php"><i class="fas fa-home" style="color:#efefef;font-size:2em; padding:15px 0 5px 10px"></i></a>

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<ul class="nav navbar-nav">
				</ul>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown bootstrap2">
							<a  href="index.php">Trang Chủ
							</a>
						</li>
						<li class='dropdown'>
							<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Kho
								<span class='caret'></span>
							</a>
							<ul class='dropdown-menu'>
								<li><a href='khothuoc.php'>kho thuốc</a></li>
								<li class='divider'></li>
								<li><a href='khovattu.php'>kho vật tư</a></li>
								<li class='divider'></li>
							</ul>
						</li>
						<?php 
						 	require_once"config/taikhoan.php";
						 	$db = new Nguoisudung();
						 	$result = $db->getrow_taikhoan($_SESSION["username"]);
						 	if($result['QuyenTruyCap']=="admin")
						 	{
						 		echo"<li class='dropdown'>";
									echo"<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Thống Kê";
										echo"<span class='caret'></span>";
									echo"</a>";
									echo"<ul class='dropdown-menu'>";
										echo"<li><a href='thongke_thuoc.php'>Thống kê thuốc</a></li>";
										echo"<li class='divider'></li>";
										echo"<li><a href='thongketest.php'>Thống kê doanh thu</a></li>";
										echo"<li class='divider'></li>";
									echo"</ul>";
								echo"</li>";
							}
						?>

							<li class='dropdown'>
								<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Người dùng
										<span class='caret'></span>
								</a>
									<ul class='dropdown-menu'>
										<?php 
										 	require_once"config/taikhoan.php";
										 	$db = new Nguoisudung();
										 	$result = $db->getrow_taikhoan($_SESSION["username"]);
										 	if($result['QuyenTruyCap']=="admin")
										 	{
												echo"<li><a href='danhsachnhanvien.php'>Danh sách nhân viên</a></li>";
												echo"<li class='divider'></li>";
											}
										?>
										<li><a href='doimatkhau.php'>Đổi mật khẩu</a></li>
										<li class='divider'></li>
									</ul>
								</li>	
						
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if(!isset($_SESSION["username"])){
								echo"<li><a href='#'>Welcome $_SESSION[username]!</a></li>";
								echo"<li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
							}
							else
							{
								echo"<li><a href='#'>$_SESSION[username]</a></li>";

								echo"<li><form method='POST' role='form'><button type='submit' class='btn btn-Logout' name='logout' style='margin-top:8px;'>Đăng xuất</button></form></li>";

								
								if(isset($_POST['logout'])){
									session_destroy();
									header('location:dangnhap.php');
									exit;
								}
							}
						?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</div>
</header>