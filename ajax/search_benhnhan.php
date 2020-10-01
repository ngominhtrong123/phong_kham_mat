<?php
 	require_once"../config/ajax.php";
 	$db = new Ajax();
 	$timkiem = $_GET['timkiem'];
 	$result = $db->search_benhnhan($timkiem);
 	$i = 1;
 	foreach($result as $row)
 	{
 		if($row['TrangThai']==1){

 			if($row['GioiTinh']==0)
 			{
 				$gioitinh="Nam";
 			}
 			else
 			{
 				$gioitinh="Nữ";

 			}
 			$mabn = $row['SDT'];
 			echo"<tr>";
	 			echo"<td>$i</td>";
	 			echo"<td><svg style='margin-left: 25px;' id='barcode".$row['MaBN']."'></svg></td>";
	 			echo"<td>$row[HoTenBN]</td>";
	 			echo"<td>$row[SDT]</td>";
	 			echo"<td>$gioitinh</td>";
	 			echo"<td>$row[CMND]</td>";
	 			echo"<td><a href='khambenh1.php?id=$row[MaBN]'><button type='submit' class='btn btn-info'>Khám bệnh</button></a></td>";
	 			echo"<td><a href='dothiluc.php?id=$row[MaBN]'><button type='button' class='btn btn-info'>Đo thị lực</button></a></td>";
		 		echo"<td><a href='fixbenhnhan.php?id=$row[MaBN]'><button type='submit' class='btn btn-warning'>Sửa</button></a></td>";
		 		echo"<td><a href='lichsukhambenh.php?id=$row[MaBN]'><button type='button' class='btn btn-success'>Lịch sử khám</button></a></td>";
 			echo"</tr>";
 			$i++;
 			echo"<script >
				JsBarcode('#barcode".$row['MaBN']."', '$row[MaBN]',{
				 width: 1,
				 height: 15});
				</script>";
 		}	
 	}
?>
