<?php
require_once "database.php";
/**
 * 
 */
class ThongKe
{
	public function kiemtra($fistDay,$lastDay){
		$db = new Database();
		$sql = "SELECT * FROM `donthuoc` WHERE NgayKeDon BETWEEN '$fistDay' AND '$lastDay' ";
		$result = $db->getdata($sql);
		return $result;

	}
	public function chooseYear($year){
		$db = new Database();
		$sql = "SELECT * 
				FROM 
				(
				    SELECT *, Year(NgayKeDon) as Y, Month(NgayKeDon) as M, Day(NgayKeDon) as D 
				    FROM donthuoc 
				    WHERE Year(NgayKeDon)='$year' 
				) t 
				
			";
		$result = $db->getdata($sql);
		return $result;
	}
	public function chooseMonth($month,$year){
		$db = new Database();
		$sql = "SELECT * 
				FROM 
				(
				    SELECT *, Year(NgayKeDon) as Y, Month(NgayKeDon) as M, Day(NgayKeDon) as D 
				    FROM donthuoc 
				    WHERE Month(NgayKeDon)='$month' AND Year(NgayKeDon)='$year' 
				) t 
				
			";
		$result = $db->getdata($sql);
		return $result;
	}




}