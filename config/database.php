<?php
/**
 * 
 */
class Database
{
	private $hn ="localhost",
			$un ="root",
			$pw ="",
			$db ="quanly_phongkham";

	public $conn;

	function __construct()
	{
		$this->conn = mysqli_connect($this->hn, $this->un, $this->pw, $this->db);

		if($this->conn->connect_error)
			{
				die('Ket noi that bai').$this->conn->connect_error;
				exit();
			}
			
		$this->conn->set_charset("UTF8");
	}

	public function query($sql){
		$result = $this->conn->query($sql);
		return $result;
	}

	public function getdata($sql){
		$result = $this->conn->query($sql); //$result =  mysqli_query($this->conn,$sql);
		$data = array();
		while($row = mysqli_fetch_assoc($result)){
			$data[]=$row;
		}
		return $data;
	}
	public function getrow($sql){
		$result = $this->conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	public function num_rows($sql){
		$result = $this->conn->query($sql);
		if($result){
			$num = mysqli_num_rows($result);
			return $num;
		}		
	}
}