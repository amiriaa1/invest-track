<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
$fee=new ManageFees();
$userPayments = $fee->GetmaWalletList($uid);
	
foreach ($userPayments as $userPayment) {
	
	$mainwallet=$userPayment['mainwallet'];
	$vip=$userPayment['vip'];
}	
$pid='';
$Getinvestlistnoid = $fee->Getinvestlistnoid($pid);


	
	
	if(isset($_POST['amount']) && $_POST['amount']>='1000'){
		
		
		
	
		$pid=$_POST['pid'];
			
		
		$Getinvestlistnoid1 = $fee->Getinvestlist($pid);
		
		foreach ($Getinvestlistnoid1 as $Getinvestlistnoidprob) {

		$exptime=$Getinvestlistnoidprob['exptime'];
		$investrate=$Getinvestlistnoidprob['investrate'];

	}
	
	
	
	$amount=$_POST['amount'];	
	
     
	$expdate=$exptime;
	$aactive='1';
	$intrest=$investrate;
	$investpack=$pid;
	
		
		$start_date=date("Y-m-d");
		$Addinvestuserprob = $fee->Addinvestuser($amount,$expdate,$aactive,$uusername,$intrest,$investpack,$start_date);
		if($Addinvestuserprob==1){
			

			$courseList = $fee->GetWallet($uid);
			 foreach ($courseList as $courseStudentInfo)
			{$walletget=$courseStudentInfo['mainwallet'];
			 $incomewallet=$courseStudentInfo['incomewallet'];}
			
			$sum=$walletget-$amount;
			
			if($sum<0){
								
			echo'wallet has less than '.$uppaymentdprob.'$ cant approve';
								
							}
							else{
							$uidprob=$uid;	
							$uppaymentdprob=$amount;
							$uptrack_codeprob='1010';
$fee->AddUserPayment($uidprob,-$uppaymentdprob,0,$uptrack_codeprob,'withdraw for invest',20);
								
						
						$fee->WalletUpdate($sum,$uid);
						$test=date("d");
						$mah=date("m");
						
						if($mah==1){$daybyday='31';}
						if($mah==2){$daybyday='28';}
						if($mah==3){$daybyday='31';}
						if($mah==4){$daybyday='30';}
						if($mah==5){$daybyday='31';}
						if($mah==6){$daybyday='30';}
						if($mah==7){$daybyday='31';}
						if($mah==8){$daybyday='31';}
						if($mah==9){$daybyday='30';}
						if($mah==10){$daybyday='31';}
						if($mah==11){$daybyday='30';}
						if($mah==12){$daybyday='31';}

$leftmount=$daybyday-$test;
$percentage=$leftmount * 0.16 ;
$totalWidth=$amount;
$amount2 = ($percentage / 100) * $totalWidth;
$sum=$incomewallet+$amount2;
				$fee->WalletUpdateincome($sum,$uid);
				$uppaymentdprob=$amount2;
				$uptrack_codeprob='1212';
$fee->AddUserPayment($uidprob,$uppaymentdprob,0,$uptrack_codeprob,'deposit to income wallet for '.$leftmount.' day invest ',10);				
						Success(_INVEST_ADDED_SUCCESSFULLY);
						$ucomment1=$ucomment;
						
						investrefcod($ucomment1,$uusername,$amount);
								
							}
							
			
			
			
			
		}
		
		
	}	
			
	
		
echo'


<div class="col-12">
<div class="box box-inverse bg-dark bg-hexagons-white">
<div class="box-body">
<div class="row">						
<center><H2>for invest you need first deposit to wallet</H2></center>
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
					<h6>The capital can be withdrawn after one year</h6>
					';
if($vip==1){
					echo'
					<span class="label label-success">youre are a vip user</span><br><br>
					
					';
					}
					
					echo'
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								
									<label for="1hashid">invest program :</label>
									<select id="pid" name="pid" class="form-control select2 w-p100" >
									
									';
									foreach ($Getinvestlistnoid as $Getinvestlistnoidprob) {
	
	                                      ;
										  
										  
										  echo'
										         
	 <option id="pid" name="pid" value="'.$Getinvestlistnoidprob['pid'].'" selected="selected">'.$Getinvestlistnoidprob['acomment'].'</option>
										  ';
                                                         }
									echo'
						 
						</select>
									</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								<h5>Amount<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="number" name="amount" id="amount" class="form-control" required data-validation-required-message="This field is required" min="1000">
								</div>
							</div>

							</div>
						
						
					
						
							<div class="col-md-6">
								<div class="form-group">
								<h5>Wallet <span class="text-danger">*</span></h5>
									<div class="controls">
										<select class="form-control select2 w-p100" disabled="disabled">
						  <option selected="selected">Main Wallet: '.$mainwallet.' $</option>
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





