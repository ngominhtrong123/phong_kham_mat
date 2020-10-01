<?php session_start();
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Phòng Khám Minh Trọng</title>
	<script src="jquery/jquery.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" ></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/style.css">
	<link rel="stylesheet" href="dangnhap.css">
</head>
<body>
	<div class="container">
		<h3 class="text-center text-white pt-5" style="color:#FFFFFF;">Phòng khám Minh Trọng</h3>
		<?php
			require_once"config/taikhoan.php";
			if(isset($_POST['login']))
			{
				$nhap = New Nguoisudung();
				$result=$nhap->Login($_POST['username'],md5($_POST['password']));
				if($result == 0){
					echo"<div class='col-md-12 text-center' style='padding:0;' >";
						echo"<div  class='alert alert-danger' role='alert'>";
							echo"Tài khoản hoặc mật khẩu không đúng, xin kiểm tra lại.</a>";
						echo"</div>";
					echo"</div>";
				}else{
					$_SESSION['username']=$_POST['username'];
					$nhap->redirect("index.php");
				}
			}
		?>
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="logo.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="username" id="inputEmail" class="form-control" placeholder="username" required autofocus name="username">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name='login'>Đăng nhập</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Quên mật khẩu?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>