<?php

include_once('main.php');
$student = new ManageStudents();

$login_needed=0;



if (isset($_POST["email"]))
		{
			$email = $_POST['email'];
			
			

						$security_key = $student->SendResetLink($email);
						$studentProp=$student->GetStudentInfo($email);
						$utimestampuserupdatee=$studentProp['utimestamp'];
						if($security_key!="0")
						{
						


$test=date("Y-m-d H:i:s");
$sum=date("Y-m-d H:i:s", strtotime($utimestampuserupdatee. ' + 5 minute'));
sendemailforgot($email,$security_key);
/*
if($test < $sum){$error = _MAIL_NOT_SEND_WAIT_5_MIN;}
else{$success = _A_LINK_SEND_TO_YOUR_MAIL_CLICK_ON_THAT;}

	*/					
						
						
						
						
					}
									  
			
			
			
			
			
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

    <title>'.$system_title.'</title>
  
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
			<p class="auth-msg text-black-50">forgot password</p>
               <form action=""	method="post" class="form-element">
';

if (!isset($_POST["email"])){
echo'
			  <div class="form-group has-feedback">
				<input type="email" class="form-control" name="email" id="email" placeholder="Email">
				<span class="ion ion-email form-control-feedback text-dark"></span>
			  </div>
			  
		
			  ';
			  }
			  
			  if(!empty($error))
		{
			Failure($error);
		}
		if(!empty($success))
		{
			Success($success);
		}
			  
			  
			  echo'
			  
			  <div class="row">
				
				'.(!empty($message)?'<span class="error">'.$message.'.</span><br>':'').'
				
				<div class="col-12 text-center">
		';

if (!isset($_POST["email"])){
echo'

				  <button type="submit" name="forgot"  class="btn btn-rounded my-20 btn-success">submit</button>
				  ';
				  }
				  echo'
				</div>
				<!-- /.col -->
			  </div>
			</form>

			<div class="text-center text-dark">
			
				
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