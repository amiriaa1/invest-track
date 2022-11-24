<!DOCTYPE html>
<?php
include('main.php');

if($system_settings["maintenance"]==0)
{
	
	header("Location:index");
}
else{



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
<body class="hold-transition theme-yellow bg-img" style="background-image: url(images/bg-e.jpg)">
	
	<section class="error-page h-p100">
		<div class="container h-p100">
		  <div class="row h-p100 align-items-center justify-content-center text-center">
			  <div class="col-lg-7 col-md-10 col-12">
				  <div>
					  <h1 class="text-white font-weight-900 font-size-200"> <i class="fa fa-gear fa-spin"></i></h1>
					  <h1 class="text-white"> <i class="fa fa-warning text-danger"></i> UNDER MAINTENANCE!</h1>
					  <h3 class="text-white">We re sorry for the inconvenience.</h3>
					  <h4 class="mb-25 text-white">Please check back later.</h4>			  

					  <footer class="mt-35 text-white">
						Copyright &copy; 2022  <a href="#" class="text-white">###</a>. All Rights Reserved.
					  </footer>
				  </div>
			  </div>				
		  </div>
		</div>
	</section>



	<!-- js -->
	<script src="js/vendors.min.js"></script>


</body>
</html>



';
}
?>