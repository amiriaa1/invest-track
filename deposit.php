<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
$fee = new ManageFees();


$query = " WHERE aactive='1'";			
$discountList = $fee->GetwalletListttp($query);


echo'

<div class="col-12">

<div class="row mt-30">
';
foreach($discountList as $discountProp)
					{
					
					
					
echo'





			  <div class="col-12 col-md-6 col-lg-4">
				<div class="box box-body bg-hexagons-dark pull-up">
				  <div class="media align-items-center p-0">
					<div class="text-center">
					  <a href="#"><i class="cc USDT mr-5" title="wallet"></i></a>
					</div>
					<div>
					';
					if($discountProp['wallet_type']==1){echo'<h3 class="no-margin">TRC20</h3>';}
					if($discountProp['wallet_type']==2){echo'<h3 class="no-margin">Bep20</h3>';}
					if($discountProp['wallet_type']==3){echo'<h3 class="no-margin">ERC20</h3>';}
					echo'
					  
					</div>
				  </div>
				  <div class="flexbox align-items-center mt-25">
					<div>
					  <p class="no-margin">'.$discountProp['wallet'].'<span class="text-gray">BTC</span></p>
					</div>
					
				  </div>
				</div>			
			  </div>
			  
			
			  
			  ';
			  }
			  echo'
			
			  
			  </div>
			  
					








<script type="text/javascript">
							function showStudentProp()
							{
								$("#show_back").html(\'<img src="images/wait.gif">\');
								var hashid = $("#hashid").val();
								var amount = $("#amount").val();
								var date = $("#date").val();
								if(hashid!=""){
								$.ajax({
								    url: "aj.php",
								    type: "POST",
								    data: {op:"vfr",hashid:hashid,amount:amount,date:date},
									dataType: "json",
								    success: function(data){
							
							if(data.statusCode==200){ 
                                document.getElementById("sa-success").style.visibility = "visible";
							$("#sa-success").html("Deposit applied successfully wait for admin approval !");   		
								
								
								
								
								
								
								}
									
                                else if(data.statusCode==201){
									
									
									
									
								$("#show_back").html("Invalid Deposit !");
								
								
							}
									
									},
									
								    error: function(){$("#show_back").html("Problem in Ajax")}
								});
								                           }
														   else{
			$("#show_back").html("Deposit can not be blank .Enter a Valid Deposit !");
		}
		                         
								
								
							}
							
							
						</script>

 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">Client deposit</h4>
			 		
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
			
					<!-- Step 1 -->
					<h6>Client Information</h6>
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="1hashid">Hash ID :</label>
									<input type="text" onkeyup="" class="form-control" name="hashid" id="hashid">
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
								<label for="Date">Date :</label>
								<input type="date" name="date" class="form-control" onkeyup="" required data-validation-required-message="This field is required"> 
								

								
							</div>
						</div>
						
							<div class="col-md-6">
								<div class="form-group">
								
									<div class="controls">
										
										<br>
										
										<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info" onclick="showStudentProp()">Submit</button>
							
							
						</div>
									</div>
							</div></div>
						</div>
						
						
						</div>
						</div>



<div name"sa-success" id="sa-success" class="alert alert-success" style="visibility:hidden;></div>


';


include_once('footer.php');




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





