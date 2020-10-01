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
							<li><a href="#">Thêm mới BN</a></li>
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
							<li><a href="#">Quản lý danh mục vật tư</a></li>
							<li class="divider"></li>
							<li><a href="#">Quản lý danh mục dịch vụ</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Kho
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Thống kê Thuốc</a></li>
							<li class="divider"></li>
							<li><a href="#">Thống kê Vật Tư</a></li>
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
				<a href="#" class="list-group-item list-group-item-action">Khám Bệnh</a>
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
			<div class="col-md-12 text-center text-primary" >
				<h3 style="margin-top: 10px;">Chi Tiết Khám Bệnh</h3>
			</div>
			<div class="col-md-12">
				<div class="col-md-3">
					<div class="form-group">
						<label>Mã Bệnh Nhân</label>
						<p>BN09</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Họ Và Tên</label>
						<p>Trần Văn Tèo</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Giới Tính</label>
						<p>Nam</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>SĐT</label>
						<p>0849563838</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Địa Chỉ</label>
						<p>34 Nguyễn An Ninh, Phường EATAM, Thành Phố Buôn Ma Thuột, Đắk Lắk</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Ghi Chú</label>
						<p>15 ngày sau đến tái khám</p>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="height: 300px; overflow: auto;margin: 15px 0 15px 0;">
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-striped text-center">
						<header>
							<tr>
								<td>STT</td>
								<td>Mã Bệnh Nhân</td>
								<td>Ngày Khám</td>
								<td>Dịch Vụ</td>
								<td>Chi Tiết Dịch Vụ</td>
							</tr>
						</header>
						<body>
							<tr>
								<td>20</td>
								<td>BN01</td>
								<td>16/01/2020</td>
								<td>Khám Bệnh</td>
								<td>Đau mắt đỏ</td>
							</tr>
							<tr>
								<td>19</td>
								<td>BN01</td>
								<td>16/11/2019</td>
								<td>Phẫu Thuật</td>
								<td>Ruột Thừa</td>
							</tr>
							<tr>
								<td>18</td>
								<td>BN01</td>
								<td>16/10/2019</td>
								<td>Khúc Xạ</td>
								<td>Đo Thị Lực</td>
							</tr>
							<tr>
								<td>17</td>
								<td>BN01</td>
								<td>16/08/2019</td>
								<td>Thẩm Mỹ</td>
								<td>Nối Mi</td>
							</tr>
							<tr>
								<td>16</td>
								<td>BN01</td>
								<td>17/07/2019</td>
								<td>Khám Bệnh</td>
								<td>Rối Loạn Tiêu Hóa</td>
							</tr>
							<tr>
								<td>16</td>
								<td>BN01</td>
								<td>15/05/2019</td>
								<td>Khám Bệnh</td>
								<td>Rối Loạn Tiêu Hóa</td>
							</tr>
							<tr>
								<td>16</td>
								<td>BN01</td>
								<td>16/04/2019</td>
								<td>Khám Bệnh</td>
								<td>Rối Loạn Tiêu Hóa</td>
							</tr>
							<tr>
								<td>16</td>
								<td>BN01</td>
								<td>03/01/2019</td>
								<td>Khám Bệnh</td>
								<td>Rối Loạn Tiêu Hóa</td>
							</tr>
							<tr>
								<td>16</td>
								<td>BN01</td>
								<td>05/05/2018</td>
								<td>Khám Bệnh</td>
								<td>Rối Loạn Tiêu Hóa</td>
							</tr>
							<tr>
								<td>16</td>
								<td>BN01</td>
								<td>02/01/2018</td>
								<td>Khám Bệnh</td>
								<td>Rối Loạn Tiêu Hóa</td>
							</tr>
						</body>
					</table>
				</div>
			</div>
			<div class="co-md-12" style="margin-bottom: 7px;">
				<form class="navbar-form" role="form">
					<div class="col-md-3">
						<div class="form-group">
							<label for="exampleInputEmail1">Chọn: </label>
							<select class="form-control">
								<option selected>--Ngày--</option>
								<option>01</option>
								<option>02</option>
								<option>03</option>
								<option>04</option>
							</select>
						</div>
					</div>
					<div class="col-md-2" style="margin-right: 3%;">
						<div class="form-group">
							<select class="form-control">
								<option selected>--Tháng--</option>
								<option>01</option>
								<option>02</option>
								<option>03</option>
								<option>04</option>
							</select>
						</div>
					</div><div class="col-md-4">
						<div class="form-group">
							<select class="form-control">
								<option selected>--Năm--</option>
								<option>2020</option>
								<option>2019</option>
								<option>2018</option>
								<option>2017</option>
							</select>
						</div>
					</div>
				</form>
				<div class="col-md-12 table-responsive" style="margin-top: 15px;">
					<table class="table table-bordered table-striped text-center">
						<header>
							<tr>
								<td>STT</td>
								<td>Mã Bệnh Nhân</td>
								<td>Ngày Khám</td>
								<td>Dịch Vụ</td>
								<td>Chi Tiết</td>
								<td>Đơn Vị Tính</td>
								<td>Số Lượng</td>
								<td>Đơn Giá</td>
								<td>Thành Tiền</td>
							</tr>
						</header>
						<body>
							<tr>
								<td>20</td>
								<td>BN01</td>
								<td>16/01/2020</td>
								<td>Khám Bệnh</td>
								<td>Đau mắt đỏ</td>
								<td>vỉ</td>
								<td>1</td>
								<td>100.000</td>
								<td>100.000</td>
							</tr>
							<tr>
								<td>19</td>
								<td>BN01</td>
								<td>16/01/2020</td>
								<td>Mua Thuốc</td>
								<td>Thuốc Trị Đau mắt đỏ</td>
								<td>vỉ</td>
								<td>1</td>
								<td>100.000</td>
								<td>100.000</td>
							</tr>
						</body>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>