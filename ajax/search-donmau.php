<?php
 	require_once"../config/ajax.php";
 	$db = new Ajax();
 	$tenbenh = $_GET['tenbenh'];
 	$idbenhnhan = $_GET['idbenhnhan'];
 	$result = $db->search_donmau($tenbenh);
 	foreach($result as $row)
	{
		if($row['DonMau']==1)
		{
			echo"<div class='list-group-item list-group-item-action border-1' id='$row[ID]' style='cursor: pointer'>$row[ChuanDoan]</div>";
			echo"<script>
				$(document).ready(function() {
					$('#$row[ID]').click(function() {
						var a = $(this).html();
						var idbenhnhan = '$idbenhnhan';
						var id_donmau = '$row[ID]';
						$.get('ajax/show-donmau.php',{ID:a,idbenhnhan:idbenhnhan,id_donmau:id_donmau},function(data){
							$('#show-tenthuoc').html(data);
							$('#search-tenbenh').fadeOut();
						});
					});			
				});	
				</script>";
		}
	}
?>
