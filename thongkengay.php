<?php
	require_once("header.php")
?>
	<!---------------------------------MAIN-------------------------------------->
	<div class="container" style=" margin-top:10px;">
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
				<h3>CHI TIẾT HÓA ĐƠN NGÀY <?php echo $_GET['ngay']; echo " THÁNG "; echo $_GET['thang']; ?></h3>
			</div>
		<!-------bảng thống kê doanh thu tháng--------------->
			<div class="col-md-12 table-responsive" style="height:500px;">
				<table class="table table-bordered table-striped text-center" id="tblData">
					<header>
						<tr>
							<td>STT</td>
							<td>Thời gian</td>
							<td>Tên bệnh nhân</td>
							<td>Chuẩn đoán</td>
							<td>Ngày tái khám</td>
							<td>Giá tiền</td>
							<td>chi tiết</td>
						</tr>
					</header>
					<form method="POST" role="form">
						<tbody id="search-sdt">
							<?php
							require_once"config/testthongke.php";
							$db= new ThongKe();
							$data = $db->thongkengay($_GET['ngay'],$_GET['thang']);
							$doanhthu = 0;
							$i=1;
							foreach($data as $row)
							{
								$result = $db->lay_thongtin_dong($row['IdBN']);	
									echo"<tr>";
										echo"<td>$i</td>";
										echo"<td>$row[thoigian]</td>";
										echo"<td>$result[HoTenBN]</td>";
										echo"<td>$row[ChuanDoan]</td>";
										echo"<td>$row[TaiKham]</td>";
										echo"<td>$row[GiaCuoi]</td>";
										echo"<td><a href='chitietkhambenh.php?id=$row[IdBN]&ID=$row[ID]'><button type='button' class='btn btn-warning'>xem chi tiết</button></a></td>";
									echo"</tr>";
									$i++;
									$doanhthu = $doanhthu+$row['GiaCuoi'];
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
						<span style="color:#bd0103;"><?php
						require_once"config/testthongke.php";
						$db= new ThongKe();
						$get = $db->thongkesobn($_GET['ngay'],$_GET['thang']);
						echo $get['sobenhnhan'];
					?></span>	
					</div>
				</div>
			</div>	
		</div>
	</div>
<script>
	function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'thongke.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){

        var blob = new Blob(['\ufeff', tableHTML], {
            type: 'text/xls;charset=utf8mb4_vietnamese_ci'
        });
        navigator.msSaveOrOpenBlob( blob, filename)
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>