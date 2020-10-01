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
				<h3>QUẢN LÝ DANH MỤC THUỐC</h3>
			</div>
			<div class="col-md-12" style="height:500px; overflow:scroll; ">
				<div class="col-md-3" style="padding: 0;">
					<button type="submit" class="btn btn-info">Thêm Loại Thuốc</button>	
				</div>
				<table class="table table-bordered table-striped text-center">
					<header>
						<tr>
							<td>STT</td>
							<td>Mã Thuốc</td>
							<td>Tên Thuốc</td>
							<td>Đơn Vị Tính</td>
							<td>Đơn Giá</td>
							<td>Số Lượng</td>
							<td></td>
						</tr>
					</header>
					<body>
						<tr>
							<td>20</td>
							<td>PN-01</td>
							<td>PANADOL</td>
							<td>Vỉ</td>
							<td>20.000</td>
							<td>10</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
						<tr>
							<td>19</td>
							<td>TF-01</td>
							<td>TIFFY</td>
							<td>Vỉ</td>
							<td>10.000</td>
							<td>10</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
						<tr>
							<td>18</td>
							<td>BE-01</td>
							<td>BECCBERIN</td>
							<td>lọ</td>
							<td>15.000</td>
							<td>20</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
						<tr>
							<td>17</td>
							<td>FI-01</td>
							<td>FILATOP</td>
							<td>hộp</td>
							<td>100.000</td>
							<td>10</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
						<tr>
							<td>17</td>
							<td>FI-01</td>
							<td>FILATOP</td>
							<td>hộp</td>
							<td>100.000</td>
							<td>10</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
						<tr>
							<td>17</td>
							<td>FI-01</td>
							<td>FILATOP</td>
							<td>hộp</td>
							<td>100.000</td>
							<td>10</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
						<tr>
							<td>17</td>
							<td>FI-01</td>
							<td>FILATOP</td>
							<td>hộp</td>
							<td>100.000</td>
							<td>10</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
						<tr>
							<td>17</td>
							<td>FI-01</td>
							<td>FILATOP</td>
							<td>hộp</td>
							<td>100.000</td>
							<td>10</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
						<tr>
							<td>17</td>
							<td>FI-01</td>
							<td>FILATOP</td>
							<td>hộp</td>
							<td>100.000</td>
							<td>10</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
						<tr>
							<td>17</td>
							<td>FI-01</td>
							<td>FILATOP</td>
							<td>hộp</td>
							<td>100.000</td>
							<td>10</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
						<tr>
							<td>17</td>
							<td>FI-01</td>
							<td>FILATOP</td>
							<td>hộp</td>
							<td>100.000</td>
							<td>10</td>
							<td style="padding: 0;">
								<button type="submit" class="btn btn-info">sửa</button>
								<button type="submit" class="btn btn-danger">xóa</button>
							</td>
						</tr>
					</body>
				</table>
			</div>			
		</div>
	</div>
</body>
</html>