<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>phòng khám Minh Trọng</title>
	<script src="jquery/jquery.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" ></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/style.css">
</head>
<body>
	<!------------------------MENU----------------------------------->
	<div class="container-fluid" style="padding: 0; ">
		<nav class="navbar navbar-inverse" style="border-radius: 0;">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Trang Chủ</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Chức Năng
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="index.php">Thêm mới BN</a></li>
							<li class="divider"></li>
							<li><a href="khambenh.php">Khám Bệnh</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Quản lý
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Quản lý tên bệnh</a></li>
							<li class="divider"></li>
							<li><a href="#">Quản lý tên thuốc</a></li>
							<li class="divider"></li>
							<li><a href="#">Quản lý dịch vụ</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Kho
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Thống kê thuốc</a></li>
							<li class="divider"></li>
							<li><a href="#">Thống kê vật tư</a></li>
							<li class="divider"></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Thống Kê
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Thống kê bệnh nhân</a></li>
							<li class="divider"></li>
							<li><a href="#">Thống kê doanh thu</a></li>
							<li class="divider"></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container-fluid" style=" margin-top:10px;">
		<div class="col-md-3">
			<div class="list-group">
				<a href="#" class="list-group-item list-group-item-action ">
					Thêm Mới Bệnh Nhân
				</a>
				<a href="khambenh.php" class="list-group-item list-group-item-action">Khám Bệnh</a>
				<a href="danhsachbenhnhan.php" class="list-group-item list-group-item-action ">Danh Sách Bệnh Nhân</a>
				<a href="#" class="list-group-item list-group-item-action">Quản Lý Tên Bệnh</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Quản Lý Tên Thuốc</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Quản Lý Dịch Vụ</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Thống Kê Thuốc</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Thống Kê Vật Tư</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Thống Kê Bệnh Nhân</a>
				<a href="#" class="list-group-item list-group-item-action disabled">Thống Kê Doanh Thu</a>
			</div>
		</div>
		<div class="col-md-9">
			<div class="col-md-12 text-center text-primary">
				<h3>Thêm Vật Tư</h3>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
					<div class="form-group">
						<label for="">Nhập Mã Vật Tư: </label>
						<input type="text" class="form-control" placeholder="Nhập Mã
						 Vật Tư">
					</div>
					<div class="form-group">
						<label for="">Nhập Tên Vật Tư: </label>
						<input type="text" class="form-control" placeholder="Nhập Tên Vật Tư">
					</div>
					<div class="form-group">
						<label for="">Chọn Đơn Vị Tính: </label>
						<select class="form-control">
							<option>Thùng</option>
							<option>Túi</option>
							<option>Hộp</option>
							<option>chiếc</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Nhập Đơn Giá: </label>
						<input type="text" class="form-control" placeholder="Nhập Đơn Giá">
					</div>
					<div class="form-group">
						<label for="">Nhập Số Lượng: </label>
						<input type="text" class="form-control" placeholder="Nhập Số Lượng">
					</div>
					<button type="submit" class="btn btn-primary" style="margin-left: 200px;">Thêm</button>
			</div>
		</div>
	</div>
</body>
</html>