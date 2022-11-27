<?php

include_once('main.php');
$student = new ManageStudents();

$login_needed=0;



if (isset($_POST["email"]))
		{
			$email = $_POST['email'];
			
			

						$security_key = $student->SendResetLink($email);
						
						
						if($security_key!="0")
						{
						$success = _A_LINK_SEND_TO_YOUR_MAIL_CLICK_ON_THAT;	
							
								
$data = array(

 "sender" => [
"name" => "buynex",
"email" => "info@buynex.info",

],
 "to" => [	
 
 [
 
 "email" => $email,
"name" => "users",
 ],

 ],
 "subject" => "forgot pass confirm key",
"htmlContent" => "<html><head></head><body><p>Hello,</p><a href=\"my.buynex.info/login?op=reset&email=".$email."&security_key=".$security_key."\">click on this link for reset password</a>
</p></body></html>" 
);           
	
	
                                                         
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init('https://api.sendinblue.com/v3/smtp/email');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                                                                                     
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                   
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	'User-Agent: PostmanRuntime/7.29.2', 
	'Accept: */*',
	'Content-Length: ' . strlen($data_string),
	'Content-Type: application/json',
	'api-key: '.$sendinblueapikey.''
	)                                                                     
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);

curl_close($ch);

//var_dump(json_decode($result, true));

$data2 = json_decode(trim($result), TRUE);








							
						
						
						
						
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