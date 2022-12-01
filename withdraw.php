<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
	
$fee=new ManageFees();
$userPayments = $fee->GetmaWalletList($uid);
	
foreach ($userPayments as $userPayment) {
	
	$mainwallet=$userPayment['mainwallet'];
}	
$test=date("d");
	if($test==1){
		
		
		
		
		
		
		
		
		
				
echo'


<div class="col-12">
<div class="box box-inverse bg-dark bg-hexagons-white">
<div class="box-body">
<div class="row">						
<center><H2>withdraw</H2></center>
</div>
</div>
</div>
</div>


<script type="text/javascript">
							function showStudentProp()
							{
								$("#show_back").html(\'<img src="images/wait.gif">\');
								var wallet = $("#wallet").val();
								var amount = $("#amount").val();
								var date = $("#date").val();
								if(wallet!=""){
								$.ajax({
								    url: "aj.php",
								    type: "POST",
								    data: {op:"withdraw",wallet:wallet,amount:amount,date:date},
									dataType: "json",
								    success: function(data){
							
							if(data.statusCode==200){ 
                           document.getElementById("sa-success").style.visibility = "visible";
							$("#sa-success").html("withdraw applied successfully wait for admin approval !");   		

								}
									
                                else if(data.statusCode==201){
									
									
									
									
								document.getElementById("sa-success").style.visibility = "visible";
							$("#sa-success").html("The wallet balance amount is less than your requeste");   
								
								
							}
									
									},
									
								    error: function(){$("#show_back").html("Problem in Ajax")}
								});
								                           }
														   else{
			$("#show_back").html("withdraw can not be blank .Enter a Valid withdraw !");
		}
		                         
								
								
							}
							
							
						</script>

 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">Client withdraw</h4>
			 		
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				
					<!-- Step 1 -->
					<h6>Client Information</h6>
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="1hashid">wallet ID(USDT-TRC20) :</label>
									<input type="text" onkeyup="" class="form-control" name="wallet" id="wallet">
									</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="1amount">amount (USDT) :</label>
								<div class="input-group"> <span class="input-group-addon">$</span>
	<input type="number" name="amount" id="amount" class="form-control" onkeyup="" required data-validation-required-message="This field is required"> <span class="input-group-addon">.00</span> </div>

							</div>
						</div>
				
						
							<div class="col-md-6">
								<div class="form-group">
								
									<div class="controls">
										<label>withdraw wallet</label>
						<select class="form-control select2 w-p100" disabled="disabled">
						  <option selected="selected">Main Wallet: '.$mainwallet.' $</option>
						</select>
										
										<div class="text-xs-right">
										
										<br>
							<button type="submit" class="btn btn-rounded btn-info" onclick="showStudentProp()">Submit</button>
						</div>	
							
						</div>
									
							</div>
						</div>
						
						</div>
						</div>
						</div>
<div name"sa-success" id="sa-success" class="alert alert-success" style="visibility:hidden;></div>




';

		
		
		
		
		
		
		
	}
	
	else{
		echo '
		
		<div name"sa-warning" id="sa-warning" class="alert alert-warning">withdraw only can happen in first day of the month</div>
		';
		
		}
		







echo'
	 <!-- Sweet-Alert  -->
    <script src="assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>
	
	<!-- js -->
	<script src="js/vendors.min.js"></script>
	
	<!-- Crypto Admin App -->
	<script src="js/jquery.smartmenus.js"></script>
	<script src="js/menus.js"></script>
	<script src="js/template.js"></script>
	
	<!-- Crypto Admin for demo purposes -->
	<script src="js/demo.js"></script>
	<!-- Bootstrap 4.0-->
	
    
   
</body>
</html>

	';

?>





