<!DOCTYPE html>
<html lang="en">
<?php
	include "../../config/koneksi.php";
?>
<head>
<title>UNAS Digital Library | Login</title>
<link href="<?php echo $url ?>images/unas.png" rel="icon" type="image/x-icon" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/icons/unas.png"/>
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-color: #666666;">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
        <form class="login100-form validate-form" action="<?php echo $url; ?>control/con_login.php" method="post" onSubmit="return validasi()">
            <span class="login100-form-title p-b-43">
                Silakan Login untuk Melanjutkan!
            </span>
            <div class="wrap-input100 validate-input" data-validate = "user name is required">
                <input class="input100" type="text" name="username">
                <span class="focus-input100"></span>
                <span class="label-input100">User Name</span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Password is required">
				<input class="input100" type="password" name="pass">
				<span class="focus-input100"></span>
				<span class="label-input100">Password</span>
            </div>
            <div class="container-login100-form-btn">
				<button class="login100-form-btn">
				    <font size='2'>Login</font>
				</button>
            </div><br/>
            <div class="container">
				<a class="btn btn-primary" title='Add Data' href='<?php echo $url; ?>view/register.php'><font size='3'>Register</font></a>
            </div>
        </form>
            <div class="login100-more" style="background-image: url('images/aa.jpg');">
            </div>
        </div>
    </div>
</div>	
<script type="text/javascript">
function validasi() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("pass").value;		
    if (username != "" && password!="") {
        return true;
    }else{
        alert('Username dan Password harus diisi!');
        return false;
    }}
</script>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/animsition/js/animsition.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<script src="js/main.js"></script>
</body>
</html>