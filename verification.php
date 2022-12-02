<?php


$login_needed=0;
include_once('main.php');

if($uactive==1){header ('Location: index'); exit;}
if (isset($_POST['submit'])){


$cod=$_POST['cod'];


if($autver==$cod)
{
	$mobile=$uusername;
$student = new ManageStudents();
$mobileInfo = $student->UsetTwoFactorupdate($mobile);
echo'okok';
header ('Location: index'); exit;
}



}

$llvm=$uusername;


$test=date("Y-m-d H:i:s");
$sum=date("Y-m-d H:i:s", strtotime($utimestampuserupdatee. ' + 5 minute'));
$avttime=strtotime($sum)-strtotime($test); 
$timemin=round($timemin, 0);
$timemin=$avttime/60;
$timemin=round($timemin, 0);




if($test > $sum OR $utimestampuserupdatee==NULL)
{
	sendemailverfy($llvm);
	
	}


else{
	
	$Failure=1;


	
	}
	


    
echo'

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

     <title>' . $system_title . '</title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="css/horizontal-menu.css">
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Admin skins -->
	<link rel="stylesheet" href="css/skin_color.css">	

</head>
<body class="hold-transition theme-yellow bg-img" style="background-image: url(images/auth-bg/bg.jpg)" data-overlay="3">
	
	<div class="auth-2-outer row align-items-center h-p100 m-0">
		<div class="auth-2">
		  <div class="auth-logo font-size-30">
			<a href="index" class="text-dark2" ><b>BUYNEX</b>member</a>
		  </div>
		  <!-- /.login-logo -->
		  <div class="auth-body">
			  <div class="text-center">
				<img src="images/avatar/2.jpg" alt="User Image" class="rounded-circle">
				<h3 class="mx-auto text-dark">confirm youre email</h3>			  
			  </div>	
';
if($Failure==1){Failure(_MAIL_NOT_SEND_WAIT_5_MIN);echo'Time left: '.$timemin.'min';}
else
{
	Success(_MAIL_SEND_CHEK);
	}
	

echo'
			<form id="mobile" method="post" action="" class="form-element">
			  <div class="form-group has-feedback">
				<input type="text"  id="cod" name="cod" class="form-control" placeholder="aut key">
				
		        
				<span class="ion ion-locked form-control-feedback text-dark"></span>
			  </div>
			  <div class="row">
				<div class="col-12 text-center">
				  <button type="submit" name="submit" class="btn btn-rounded my-20 btn-success">submit</button>
				</div>
				<!-- /.col -->
			  </div>
			</form>

			<div class="text-center text-dark">
			  <p class="mt-50 mb-0">chek youre email and  type the aut key in the box</p>	
			</div>
			<!-- /.social-auth-links -->

			

		  </div>
		</div>
	
	</div>


	<!-- js -->
	<script src="js/vendors.min.js"></script>

</body>	
</html>


';
?>