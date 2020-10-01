<?php
	session_start();
	require_once"../config/ajax.php";
	$id_tenbenh = $_GET['ID'];
	$id = $_GET['idbenhnhan'];
	$id_donmau = $_GET['id_donmau'];
	$db = new Ajax();
	$data = $db->get_donmau($id_donmau);
	if(isset($_SESSION['donthuoc'.$id])){
		unset($_SESSION['donthuoc'.$id]);
		unset($_SESSION['soluong'.$id]);
	}
	if(!isset($_SESSION['donthuoc'.$id])){
		$_SESSION['donthuoc'.$id] = array();
		foreach($data as $value )
		{
			$result = $db->show_thuoc($value['TenThuoc']);
			$_SESSION['donthuoc'.$id][$result['id']] = $result['id'];
		}
	}
	if(isset($_SESSION["donthuoc".$id])){
		$i=0;
		foreach ($_SESSION['donthuoc'.$id] as $value) {
			$i++;
			$db = new Ajax();
			$result = $db->getrow_thuoc($value);

			$sl = isset($_SESSION['soluong'.$id][$result['id']]) ? $_SESSION['soluong'.$id][$result['id']] : '';

			echo"<tr id='row".$result['id']."'>";
				echo"<td hidden><div id='LoiSoLuong".$result['id']."'></div></td>";
				echo"<td>$i</td>";
				echo"<td>$result[TenThuoc]</td>";
				echo"<td>$result[DonViTinh]</td>";
				echo"<td><input type='text' class='form-control soluong_thuoc' id='soluong".$result['id']."' max='$result[SoLuong]' name='soluong".$result['id']."' value='$sl'></td>";
				echo"<td id='dongia".$result['id']."'>$result[DonGia]</td>";
				echo"<td id='thanhtien".$result['id']."'></td>";
				echo"<td><input type='text' class='form-control' placeholder='Sáng 2 viên - tối 2 viên' name='cachdung".$result['id']."' ></td>";
				 echo"<td><button type='button' name='xoa' value='$result[id]' class='btn btn-danger center-block row_thuoc' id ='xoa".$result['id']."'>Xóa</button></td>";
			echo"</tr>";

			echo"<script>
					$(document).ready(function() {
							$('#soluong".$result['id']."').keyup(function() {
								var soluong = $(this).val();
								var dongia = $('#dongia".$result['id']."').text();
								var IdThuoc =' $value';
								$.get('ajax/soluong-thanhtien.php',{soluong:soluong,dongia:dongia,IdThuoc:IdThuoc},function(data){
									$('#thanhtien".$result['id']."').html(data);
								});
							});			
						});	
				</script>";
		}
	}
?>
<script>
	$('.row_thuoc').on('click', function(){
		var id  = $(this).attr('id');
		id =id.substr(3);
		$('#row'+id).remove();
		var bn = $('#idbenhnhan').html();
		$.get('ajax/xoathuoc_trongdon.php',{benhnhan:bn,IdThuoc:id},function(data){
									
		});
	});

	$('.soluong_thuoc').on('change', function(){
		var id  = $(this).attr('id');
		id =id.substr(7);

		var sl = $(this).val();


		var benhnhan = $('#idbenhnhan').html();
		$.get('ajax/soluongthuoc.php',{soluong:sl,IdThuoc:id,bn:benhnhan},function(data){
									
		});



	});
</script>
	