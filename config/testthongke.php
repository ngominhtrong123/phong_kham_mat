<?php
require_once "database.php";
/**
 * 
 */
class ThongKe
{
	public function thongkethang($thang,$nam)
	{
		$db = new database();
		$sql = "SELECT SUBSTRING(NgayKeDon, 9, 2) as Ngay, SUM(GiaCuoi) as TongTien FROM donthuoc where Month(NgayKeDon) = '$thang' and Year(NgayKeDon)='$nam' GROUP BY SUBSTRING(NgayKeDon, 9, 2)";
		$result = $db->getdata($sql);
		return $result;

	}
	public function thongkengay($ngay,$thang)
	{
		$db = new database();
		$sql = "SELECT ID,IdBN,GiaCuoi,substring(NgayKeDon, 12, 16) as thoigian,ChuanDoan,TaiKham FROM `donthuoc` WHERE DAY(NgayKeDon) = '$ngay' and Month(NgayKeDon)='$thang'";
		$result = $db->getdata($sql);
		return $result;
	}
	public function thongkesobn($ngay,$thang)
	{
		$db = new database();
		$sql = "SELECT COUNT(DISTINCT IdBN) as sobenhnhan FROM `donthuoc` WHERE DAY(NgayKeDon) = '$ngay' and Month(NgayKeDon)='$thang'";
		$result = $db->getrow($sql);
		return $result;
	}

	public function thongkenam($nam)
	{
		$db = new database();
		$sql = "SELECT month(NgayKeDon) as thang,SUM(GiaCuoi) as tongtien FROM `donthuoc` WHERE year(NgayKeDon) = '$nam' GROUP BY month(NgayKeDon)";
		$result = $db->getdata($sql);
		return $result;
	}

	public function tkdaytoday($ngaybd,$ngaykt)
	{
		$db = new database();
		$sql = "SELECT substring(NgayKeDon, 1, 10) as ngay, SUM(GiaCuoi) as tongtien, COUNT(ID) as sodon, COUNT(DISTINCT IdBN) as sobenhnhan, DAY(NgayKeDon) as day, Month(NgayKeDon) thang FROM `donthuoc` WHERE substring(NgayKeDon, 1, 10) BETWEEN '$ngaybd' and '$ngaykt' GROUP BY substring(NgayKeDon, 1, 10)";
		$result = $db->getdata($sql);
		return $result;
	}
	public function lay_thongtin_dong($id)
		{
			$db = new database();
			$sql = "SELECT * FROM benhnhan WHERE MaBN = '$id'";
			$result = $db->getrow($sql);
			return $result;
		}

	public function thongke_thuoc($ngaybd,$ngaykt)
	{
		$db = new database();
		$sql = "SELECT TenThuoc,SUM(SoLuong) as soluong,DonVi FROM `chitiet_donthuoc` WHERE substring(NgayKham, 1, 10) BETWEEN '$ngaybd' and '$ngaykt' GROUP BY TenThuoc";
		$result = $db->getdata($sql);
		return $result;
	}

}