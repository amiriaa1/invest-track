<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
$fee=new ManageFees();

$userPayments = $fee->GetmaWalletList($uid);
	
foreach ($userPayments as $userPayment) {
	
	$walletget=$userPayment['mainwallet'];
	$referralwallet=$userPayment['referralwallet'];
	$incomewallet=$userPayment['incomewallet'];
}	

	if(isset($_POST['amount'])){
		
		$amount=$_POST['amount'];
		
	if($_POST['wallet']=='incomewallet'){
		
		
		
		$sum=$incomewallet-$amount;
		
		if($sum<0){
			
			
			echo'income wallet has less than '.$amount.'$ cant approve';
			
		}
		else{
			
			$uidprob=$uid;	
							$uppaymentdprob=$amount;
							$uptrack_codeprob='90';
                      $fee->AddUserPayment($uidprob,-$uppaymentdprob,0,$uptrack_codeprob,'withdraw for transfare from income wallet',20);
			$fee->WalletUpdateincome($sum,$uid);
			$sum=$walletget+$amount;
			$fee->WalletUpdate($sum,$uid);
			
			Success(_PAYMENT_ADDED0_SUCCESSFULLY);
		}
		
		
		
		
	}
	
	else{
		
		$sum=$referralwallet-$amount;
		
		if($sum<0){
			
			
			echo'income wallet has less than '.$amount.'$ cant approve';
			
		}
		else{
			
			$uidprob=$uid;	
							$uppaymentdprob=$amount;
							$uptrack_codeprob='90';
                      $fee->AddUserPayment($uidprob,-$uppaymentdprob,0,$uptrack_codeprob,'withdraw for transfare from referral wallet',20);
			$fee->WalletUpdatereferral($sum,$uid);
			$sum=$walletget+$amount;
			$fee->WalletUpdate($sum,$uid);
			
			Success(_PAYMENT_ADDED0_SUCCESSFULLY);
		}
		
		
	}
	
	
	
	
	
	
		
	}
		
			
	
		
echo'


<div class="col-12">
<div class="box box-inverse bg-dark bg-hexagons-white">
<div class="box-body">
<div class="row">						
<center><H2>Transfer to main wallet first , if you want to withraw from other wallets</H2></center>
</div>
</div>
</div>
</div>




 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">Client invest</h4>
			 		
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				<form  class="tab-wizard wizard-circle" action=""	method="post">
					<!-- Step 1 -->
					<h6>Client Information</h6>
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								
									<label for="1hashid">To Wallet :</label>
									<select id="pid" name="pid" class="form-control select2 w-p100" disabled="disabled">
									
								 <option id="pid" name="pid"  selected="selected">Main Wallet: '.$walletget.' $</option>
						</select>
									</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="1amount">amount (US) :</label>
								<div class="input-group"> <span class="input-group-addon">$</span>
	<input type="number" name="amount" id="amount" class="form-control"  required data-validation-required-message="This field is required"> <span class="input-group-addon">.00</span> </div>

							</div>
						</div>
						
					
						
							<div class="col-md-6">
								<div class="form-group">
								<h5>From Wallet <span class="text-danger">*</span></h5>
									<div class="controls">
										<select  name="wallet" id="wallet" class="form-control select2 w-p100" >
						  <option selected="selected" name="wallet" id="wallet" value="incomewallet">income Wallet: '.$incomewallet.' $</option>
						  <option selected="selected" name="wallet" id="wallet" value="referralwallet">referral Wallet: '.$referralwallet.' $</option>
						  
						</select>
										<br>
										<div class="text-xs-right">
										
							<button type="submit" name="Submit" class="btn btn-rounded btn-info">Submit</button>
							
							</form>
						</div>
				</div>
							</div>
					</div>
			</div>
						
						
						</div>
						</div>
						
						



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





