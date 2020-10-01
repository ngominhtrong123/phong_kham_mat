<?php
  require_once"database.php";
  class Dangxuat
  {
  	public function logout(){
  		session_start();
		session_destroy();
		header("location:dangnhap.php");
  	}

  }
?>