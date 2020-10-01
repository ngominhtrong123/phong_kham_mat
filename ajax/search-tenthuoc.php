<?php
 	require_once"../config/ajax.php";
 	$db = new Ajax();
 	$tenthuoc = $_GET['tenthuoc'];
 	$result = $db->search_tenthuoc($tenthuoc);
 	$i = 1;
 	foreach($result as $row)
	{
		if($row['TrangThai']==1)
		{
			echo"<tr>";
				echo"<td>$i</td>";
				echo"<td>$row[id]</td>";
				echo"<td>$row[TenThuoc]</td>";
				echo"<td>$row[DonViTinh]</td>";
				echo"<td>$row[DonGia]</td>";
				if($row['SoLuong']<100)
				{
					if($row['SoLuong']==0){
						echo"<td class='danger'>$row[SoLuong] (thuốc trong kho đã hết)</td>";
					}
					else
					{
						echo"<td class='danger'>$row[SoLuong]</td>";
					}
				}
				else
				{
					echo"<td>$row[SoLuong]</td>";
				}
				echo"
				<td style='padding: 0;'>
					<a href='fixthuoc.php?id=$row[id]'><button type='button' class='btn btn-info'>Sửa</button></a>
					<a href='config/xoathuoc.php?id=$row[id]'><button type='button' class='btn btn-danger'name='delete' value='$row[id]'>Xóa</button></a>
					</td>";
			echo"</tr>";
			$i++;
		}
	}
?>