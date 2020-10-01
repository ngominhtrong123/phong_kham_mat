<?php 
	require_once("header.php");
?>
	<!--------------MAIN DSACH KH------------------>
	<div class="container">
		<div class="col-md-12" style="">
			<form method="POST" role="form">
				<div class="navbar-form" >
					<label>Chọn năm thống kê</label>
					<select name="year" class="form-control" >
						<?php 
							for($i=2020; $i>=2010; $i--){
								echo "<option >$i</option>";
							}
						?>
						
					</select>
					<button name="submit" type="submit" class="btn btn-success">Kiểm tra</button>
				</div>
			</form>	
		</div>		
		<div class="col-md-12" style="margin-top:15px;">
			<!-- TEST BIỂU ĐỒ -->
			<?php 
				if(isset($_POST['submit'])){
					require "config/thongke.php";
					$nhap = new ThongKe();  
					$data=$nhap->chooseYear($_POST['year']);
				}
			?>
			<div id="my-chart" style="width:100%; height:400px;"></div>
			<script>
				function drawChart(chartID, cate, data, month, title, unit, type = 'column') {
				    Highcharts.chart(chartID, {
				        chart: {
				            type: type
				        },
				        title: {
				            text: title
				        },
				        subtitle: {
					    	text: 'Click vào từng cột để xem chi tiết của từng tháng. '
					    },
					    accessibility: {
					    	announceNewData: {
					      		enabled: true
					    	}
					  	},
				        xAxis: {
				            type: 'category'
				        },
				        yAxis: {
				            title: {
				                text: unit
				            }
				        },
				        legend: {
						    enabled: true
						},
				        plotOptions: {
						    series: {
						      	borderWidth: 0,
						      	dataLabels: {
						       		enabled: true,
						        	
						      	}
						    }
					  	},

					  	tooltip: {
					    	headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
					    	pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
					  	},
				        series: data,
				        drilldown: {
				        	series: month
				        }
				    });
				}
				<?php
					function js_str($s) {
				        if (!is_numeric($s)) {
				            return '"' . addcslashes($s, "\0..\37\"\\") . '"';
				        } else {
				            return addcslashes($s, "\0..\37\"\\");
				        }
				    }

				    function js_array($array) {
				        $temp = array_map('js_str', $array);
				        return '[' . implode(', ', $temp) . ']';
				    }

				    $dates = array();
				    $total_rev = array();
				    $dem = array();
				    $tongtien = 0;
				    for($i=1; $i<=12;$i++){
				   		$dates[]="Tháng ".$i;
				   		foreach ($data as $value) {
							if($value['M'] == $i){
								$tongtien +=$value['GiaCuoi']; 
							}
						}
						$total_rev[]=$tongtien;
						$tongtien=0;
				   	}
				   	//hàm lấy theo tháng 1
					$data_day=$nhap->chooseMonth('1',$_POST['year']);
					$tongtien_day1 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day1 +=$value['GiaCuoi']; 
							}
						}
						$total_day1[]=$tongtien_day1;
						$tongtien_day1=0;
				   	}
				   	//hàm lấy theo tháng 2
					$data_day=$nhap->chooseMonth('2',$_POST['year']);
					$tongtien_day2 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day2 +=$value['GiaCuoi']; 
							}
						}
						$total_day2[]=$tongtien_day2;
						$tongtien_day2=0;
				   	}
				   	//hàm lấy theo tháng 3
					$data_day=$nhap->chooseMonth('3',$_POST['year']);
					$tongtien_day3 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day3 +=$value['GiaCuoi']; 
							}
						}
						$total_day3[]=$tongtien_day3;
						$tongtien_day3=0;
				   	}
				   	//hàm lấy theo tháng 4
					$data_day=$nhap->chooseMonth('4',$_POST['year']);
					$tongtien_day4 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day4 +=$value['GiaCuoi']; 
							}
						}
						$total_day4[]=$tongtien_day4;
						$tongtien_day4=0;
				   	}
				   	//hàm lấy theo tháng 5
					$data_day=$nhap->chooseMonth('5',$_POST['year']);
					$tongtien_day5 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day5 +=$value['GiaCuoi']; 
							}
						}
						$total_day5[]=$tongtien_day5;
						$tongtien_day5=0;
				   	}
				   	//hàm lấy theo tháng 6
					$data_day=$nhap->chooseMonth('6',$_POST['year']);
					$tongtien_day6 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day6 +=$value['GiaCuoi']; 
							}
						}
						$total_day6[]=$tongtien_day6;
						$tongtien_day6=0;
				   	}
				   	//hàm lấy theo tháng 7
					$data_day=$nhap->chooseMonth('7',$_POST['year']);
					$tongtien_day7 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day7 +=$value['GiaCuoi']; 
							}
						}
						$total_day7[]=$tongtien_day7;
						$tongtien_day7=0;
				   	}
				   	//hàm lấy theo tháng 8
					$data_day=$nhap->chooseMonth('8',$_POST['year']);
					$tongtien_day8 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day8 +=$value['GiaCuoi']; 
							}
						}
						$total_day8[]=$tongtien_day8;
						$tongtien_day8=0;
				   	}
				   	//hàm lấy theo tháng 9
					$data_day=$nhap->chooseMonth('9',$_POST['year']);
					$tongtien_day9 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day9 +=$value['GiaCuoi']; 
							}
						}
						$total_day9[]=$tongtien_day9;
						$tongtien_day9=0;
				   	}
				   	//hàm lấy theo tháng 10
					$data_day=$nhap->chooseMonth('10',$_POST['year']);
					$tongtien_day10 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day10 +=$value['GiaCuoi']; 
							}
						}
						$total_day10[]=$tongtien_day10;
						$tongtien_day10=0;
				   	}
				   	//hàm lấy theo tháng 11
					$data_day=$nhap->chooseMonth('11',$_POST['year']);
					$tongtien_day11 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day11 +=$value['GiaCuoi']; 
							}
						}
						$total_day11[]=$tongtien_day11;
						$tongtien_day11=0;
				   	}
				   	//hàm lấy theo tháng 12
					$data_day=$nhap->chooseMonth('12',$_POST['year']);
					$tongtien_day12 = 0;
					for($j=1; $j<=31;$j++){
				   		$days[]="Ngày ".$j;
				   		foreach ($data_day as $value_day) {
							if($value_day['D'] == $j){
								$tongtien_day12 +=$value['GiaCuoi']; 
							}
						}
						$total_day12[]=$tongtien_day12;
						$tongtien_day12=0;
				   	}

				?>
				<?php echo 'var lbl = ', js_array($dates), ';'; ?>
				var data = [{
				        name: 'Tổng tiền ',
				        colorByPoint: true,
				        data: <?php 
					        echo "[";
								foreach ($total_rev  as $key => $value) {
									$thang = $key+1;
									echo "{name:'Tháng ".$thang."',y:".$value.",drilldown:'".$thang."'},";
								}
							echo "]"; 
						?>
				}];

				var month = [{
						name: "Tháng 1",
						id: "1",
				        data: <?php 
					        echo "[";
								foreach ($total_day1  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 2",
						id: "2",
				        data: <?php 
					        echo "[";
								foreach ($total_day2  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 3",
						id: "3",
				        data: <?php 
					        echo "[";
								foreach ($total_day3  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 4",
						id: "4",
				        data: <?php 
					        echo "[";
								foreach ($total_day4  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 5",
						id: "5",
				        data: <?php 
					        echo "[";
								foreach ($total_day5  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 6",
						id: "6",
				        data: <?php 
					        echo "[";
								foreach ($total_day6  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 7",
						id: "7",
				        data: <?php 
					        echo "[";
								foreach ($total_day7  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 8",
						id: "8",
				        data: <?php 
					        echo "[";
								foreach ($total_day8  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 9",
						id: "9",
				        data: <?php 
					        echo "[";
								foreach ($total_day9  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 10",
						id: "10",
				        data: <?php 
					        echo "[";
								foreach ($total_day10  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 11",
						id: "11",
				        data: <?php 
					        echo "[";
								foreach ($total_day11  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				},
				{		name: "Tháng 12",
						id: "12",
				        data: <?php 
					        echo "[";
								foreach ($total_day12  as $key => $value) {
									$ngay = $key+1;
									echo "['Ngày ".$ngay."',".$value."],";
								}
							echo "]"; 
						?>
				}];
				drawChart('my-chart', lbl, data, month,<?php echo "'Thống kê doanh thu năm $_POST[year]'"?>, 'Đơn Vị VND');
			</script>
		</div>
	</div>
<?php 
	require_once("footer.php");
?>