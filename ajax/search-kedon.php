<?php
 	require_once"../config/ajax.php";
 	$db = new Ajax();
 	$tenthuoc = $_GET['tenthuoc'];
 	$idbenhnhan = $_GET['idbenhnhan'];
 	$result = $db->search_tenthuoc($tenthuoc);
 	$i = 1;
 	foreach($result as $row)
	{
		if($row['TrangThai']==1)
		{
			echo"<div class='list-group-item list-group-item-action border-1' id='$row[TenThuoc]' style='cursor: pointer'>$row[TenThuoc]</div>";
			echo"<script>
				$(document).ready(function() {
					$('#$row[TenThuoc]').click(function() {
						var a = $(this).html();
						var idbenhnhan = '$idbenhnhan';
						$.get('ajax/showtenthuoc.php',{tenthuoc:a,idbenhnhan:idbenhnhan},function(data){
							$('#show-tenthuoc').html(data);
							$('#search-tenthuoc').fadeOut();
						});
					});			
				});	
				</script>";
		}
	}
?>
