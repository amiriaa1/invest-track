<?php
include_once('main.php');
echo'<link rel="canonical" href="https://my.buynex.info/register" />';



	
	if (isset($_POST['add_student']))
	{
		
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
randomPassword();
	if (isset($_GET['referral'])){$ucomment=$_GET['referral'];}else{$ucomment=$_POST['referral'];}
        
        $uusername=$_POST['email'];
		$upass=$_POST['password'];
		$ufaname=$_POST['ufaname'];
		$uactive=0;
		$uemail=$_POST['email'];
		$uexpiration_date = date("Y-m-d", strtotime("+ 15000 day"));
		$ureg_date = date("Y-m-d");
        $umobile=randomPassword();
        


		if(empty($error))
		{
			
			if(empty($uusername) || empty($upass))
					$error = _SOME_FIELDS_ARE_REQUIRED;
			else
			{
					
				if($student->UsernameAvailability($uusername)==0)
				{
					$error = $uusername_title._USER_SIDE_USERNAME_IS_RESERVED;
					
				}
				else if($student->UsernameAvailability($uusername)==2)
				{
					$error = $uusername_title._USER_SIDE_USERNAME_IS_INVALID;
					
				}
				else
				{
               $counts = $student->AddStudent(1,$uusername,md5($upass),$uactive,$uexpiration_date,$ufaname,$uemail,$umobile,$ucomment,$ureg_date);
														
														
						session_destroy();

					if($counts==1)
					{
						

						
						$success = '. <a href="index"></a>';
                     
					}
					else
					{
						$error .= _STUDENT_ADDING_FAILED;
						
					}
				}
						
			}
		}
	}
	
	
	
	echo '

	
			';
	
	if(!empty($error))
	{
		Failure($error);
	}
	if(!empty($success))
	{
		
		echo'
		
								<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="'.$system_title.'">
	<meta name="keywords" content="'.str_replace(' ',',',$system_title).'">
	<meta name="generator" content="royaal">
    <link rel="icon" href="images/favicon.ico">

    <title>' . $system_title . '</title>
    <link rel="icon" href="images/favicon.ico">

  
  
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
		
		  </div>
		  <!-- /.login-logo -->
		  
		  
		  
		  <div class="auth-body">
		  
		  <img src="images/Success Illustration.png"><center>
		  
		  <p style="font-size:20px;">you have success registered please log in and confirm youre email    </p>
			
<form action="login" method="post" id="user_login">
			<button type="submit" name="user_login"  class="btn btn-rounded my-20 btn-success">SIGN IN</button>
						</form>
							</center>
						  
						</div>
		  
		  

						
						
		  </div>
		</div>
	
	</div>


	<!-- js -->
	<script src="js/vendors.min.js"></script>
	
	
</body>
</html>
		
		';
exit;
		
	}
	
	
	$llvm=$_POST['umobile'];
		$tre=rand(999,9999);





echo'



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="'.$system_title.'">
	<meta name="keywords" content="'.str_replace(' ',',',$system_title).'">
	<meta name="generator" content="royaal">
    <link rel="icon" href="images/favicon.ico">

    <title>' . $system_title . '| Register</title>
  
    <link rel="icon" href="images/favicon.ico">

  
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
			<p class="auth-msg text-black-50">Register a new Membership</p>

			<form action="" method="post" class="form-element">
			  <div class="form-group has-feedback">
				<input type="text" name="ufaname" id="ufaname" class="form-control" placeholder="Full name">
				<span class="ion ion-person form-control-feedback text-dark"></span>
			  </div>
			  <div class="form-group has-feedback">
				<input type="email" name="email" id="email" class="form-control" placeholder="Email">
				<span class="ion ion-email form-control-feedback text-dark"></span>
			  </div>
			  
			  ';
			  
			if (!isset($_GET['referral'])){
			  echo'
			  <div class="form-group has-feedback">
				<input type="referral" name="referral" id="referral" class="form-control" placeholder="referral cod (if you have)">
				<span class="ion ion-email form-control-feedback text-dark"></span>
			  </div>
			  ';
			}
			else{
				
			echo'
			  <div class="form-group has-feedback">
				<input type="hidden" name="referral" id="referral" class="form-control" placeholder="referral cod (if you have)">
				<span>referral cod is : '.$_GET['referral'].'</span><br>
			  </div>
			  ';	
				
			}
			echo'
			  <div class="form-group has-feedback">
				<input type="password" name="password" id="password" class="form-control" placeholder="Password">
				<span class="ion ion-locked form-control-feedback text-dark"></span>
			  </div>
			
			  <div class="row">
				<div class="col-12">
				  <div class="checkbox">
					<input type="checkbox" id="basic_checkbox_1" >
					<label for="basic_checkbox_1" class="text-dark">I agree to the <a href="#" class="text-danger"><b>Terms</b></a></label>
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-12 text-center">
				  <button type="submit" name="add_student" id="add_student" class="btn btn-rounded my-20 btn-success">SIGN UP</button>
				</div>
				<!-- /.col -->
			  </div>
			</form>

			<div class="text-center text-dark">
			  
			 
			</div>
			<!-- /.social-auth-links -->

			<div class="margin-top-30 text-center text-dark">
				<p>Already have an account? <a href="login" class="text-info m-l-5">Sign In</a></p>
			</div>

		  </div>
		</div>
	
	</div>


	<!-- js -->
	<script src="js/vendors.min.js"></script>
	
	
</body>
</html>

';


?>