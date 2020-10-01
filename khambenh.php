<?php
	require_once"header.php"
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container-fluid" style=" margin-top:10px;">
		<div class="col-md-3">
			<div class="list-group">
				<a href="#" class="list-group-item list-group-item-action">
					Thêm Mới Bệnh Nhân
				</a>
				<a href="#" class="list-group-item list-group-item-action active">Khám Bệnh</a>
				<a href="danhsachbenhnhan.php" class="list-group-item list-group-item-action active">Danh Sách Bệnh Nhân</a>
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
				<h3>LỊCH SỬ KHÁM GẦN ĐÂY</h3>
			</div>
			<div class="col-md-12" style="margin-top:15px;">
				<div class="col-md-3">
					<label for="">Mã bệnh nhân:</label>
					<span>1</span>
				</div>
				<div class="col-md-3">
					<label for="">Họ và tên: </label>
					<span>Ngô Minh Trọng</span>
				</div>
				<div class="col-md-3">
					<label for="">Ngày sinh:</label>
					<span>23/09/1994</span>
				</div>
				<div class="col-md-3">
					<label for="">Giới Tính:</label>
					<span>Nam</span>
				</div>
			</div>
			<div class="col-md-12 table-responsive">
				<table class="table table-bordered table-striped text-center">
					<header>
						<tr>
							<td>STT</td>
							<td>Ngày Khám</td>
							<td>Dịch Vụ</td>
							<td>Chi Tiết Dịch Vụ</td>
							<td></td>
						</tr>
					</header>
					<body>
						<tr>
							<td>20</td>
							<td>16/01/2020</td>
							<td>Khám Bệnh</td>
							<td>Đau mắt đỏ</td>
							<td style="padding: 0;"><button type="submit" class="btn btn-info">Xem Hóa Đơn</button></td>
						</tr>
						<tr>
							<td>19</td>
							<td>10/01/2020</td>
							<td>Phẫu Thuật</td>
							<td>Phẫu thuật ruột thừa</td>
							<td style="padding: 0;"><button type="submit" class="btn btn-info">Xem Hóa Đơn</button></td>
						</tr>
						<tr>
							<td>18</td>
							<td>10/01/2020</td>
							<td>Khúc Xạ</td>
							<td>Đo thị lực</td>
							<td style="padding: 0;"><button type="submit" class="btn btn-info">Xem Hóa Đơn</button></td>
						</tr>
						<tr>
							<td>17</td>
							<td>02/01/2020</td>
							<td>Khám Bệnh</td>
							<td>Gãy tay</td>
							<td style="padding: 0;"><button type="submit" class="btn btn-info">Xem Hóa Đơn</button></td>
						</tr>
						<tr>
							<td>16</td>
							<td>10/01/2020</td>
							<td>Phẫu Thuật</td>
							<td>Phẫu thuật ruột thừa</td>
							<td style="padding: 0;"><button type="submit" class="btn btn-info">Xem Hóa Đơn</button></td>
						</tr>
					</body>
				</table>
			</div>
			<div class="col-md-12 text-center text-primary">
				<h3>Chuẩn Đoán Bệnh</h3>
			</div>
			<div class="col-md-4">
				<form class="navbar-form" role="form">
					<div class="form-group">
						<label for="exampleInputEmail1">Chọn Dịch Vụ: </label>
						<select class="form-control">
							<option selected>--Chọn Dịch Vụ--</option>
							<option>Khám Bệnh</option>
							<option>Phẫu Thuật</option>
							<option>Thẩm Mỹ</option>
							<option>Khúc Xạ</option>
						</select>
					</div>
				</form>	
			</div>
			<!-------------GIAO DIỆN KHÁM BỆNH---------------->
			<div class="col-md-12">
				<form role="form">
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Triệu chứng: </label>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Chuẩn đoán: </label>
							<select class="form-control">
								<option selected>--Chọn loại bệnh--</option>
								<option>Quai bị</option>
								<option>Đau mắt đỏ</option>
								<option>Sốt siêu vi</option>
								<option>Sốt xuất huyết</option>
								<option>Tiêu Chảy</option>
								<option>Rối loạn tiền</option>
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-12 text-center text-primary" >
				<h3 style="margin-top: 10px;">Nhập Đơn Thuốc</h3>
			</div>
			<div class="col-md-12">
				<form action="">
					<div class="col-md-3" style="padding: 0;">
						<button type="submit" class="btn btn-danger">Thêm hàng</button>	
					</div>
					<table class="table table-bordered table-striped text-center">
						<header>
							<tr>
								<td>STT</td>
								<td>Tên Thuốc</td>
								<td>Đơn vị tính</td>
								<td width="7%;">Số lượng</td>
								<td width="10%;">Đơn Giá</td>
								<td>Cách Dùng</td>
								<td width="15%;">Ghi Chú</td>
							</tr>
						</header>
						<body>
							<tr>
								<td>1</td>
								<td>
									<input type="text" class="form-control">
								</td>
								<td>
									<select class="form-control">
										<option selected>--Đơn vị--</option>
										<option>Viên</option>
										<option>Lọ</option>
										<option>Vỉ</option>
									</select>	
								</td>
								<td>
									<input type="text" class="form-control">
								</td>
								<td>
									<input type="text" class="form-control">
								</td>
								<td>
									<input type="text" class="form-control" placeholder="sáng 2 viên, chiều 2 viên, tối 2 viên...">
								</td>
								<td>
									<input type="text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>
									<input type="text" class="form-control">
								</td>
								<td>
									<select class="form-control">
										<option selected>--Đơn vị--</option>
										<option>Viên</option>
										<option>Lọ</option>
										<option>Vỉ</option>
									</select>	
								</td>
								<td>
									<input type="text" class="form-control">
								</td>
								<td>
									<input type="text" class="form-control">
								</td>
								<td>
									<input type="text" class="form-control" placeholder="sáng 2 viên, chiều 2 viên, tối 2 viên...">
								</td>
								<td>
									<input type="text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>
									<input type="text" class="form-control">
								</td>
								<td>
									<select class="form-control">
										<option selected>--Đơn vị--</option>
										<option>Viên</option>
										<option>Lọ</option>
										<option>Vỉ</option>
									</select>	
								</td>
								<td>
									<input type="text" class="form-control">
								</td>
								<td>
									<input type="text" class="form-control">
								</td>
								<td>
									<input type="text" class="form-control" placeholder="sáng 2 viên, chiều 2 viên, tối 2 viên...">
								</td>
								<td>
									<input type="text" class="form-control">
								</td>
							</tr>
						</body>
					</table>
				</form>
			</div>
			<!-----------------KẾT THÚC GIAO DIỆN KHÁM BỆNH--------------->	
		</div>
	</div>
	<!-- Footer -->
	<footer >
		<div class="footer-copyright text-center py-3">© 2020 Copyright:
			<a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
		</div>
		<!-- Copyright -->
	</footer>
	<!-- Footer -->
</body>
</html>