<?php
 	require_once"../config/ajax.php";
 	$db = new Ajax();
 	$tenvattu = $_GET['tenvattu'];
 	$result = $db->search_tenvattu($tenvattu);
 	$i = 1;
 	foreach($result as $row)
	{
		if($row['TrangThai']==1)
		{
			echo"<tr>";
				echo"<td>$i</td>";
				echo"<td>$row[id]</td>";
				echo"<td>$row[TenVatTu]</td>";
				echo"<td>$row[DonViTinh]</td>";
				echo"<td>$row[GiaBan]</td>";
				echo"<td>$row[SoLuong]</td>";
				echo"
				<td style='padding: 0;'>
					<a href='fixvattu.php?id=$row[id]'><button type='button' class='btn btn-info'>Sửa</button></a>
					<a href='config/xoavattu.php?id=$row[id]'><button type='button' class='btn btn-danger'name='delete' value='$row[id]'>Xóa</button></a>
					</td>";
			echo"</tr>";
			$i++;
		}
	}
?>