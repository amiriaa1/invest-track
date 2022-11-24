<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
$fee = new ManageFees();	


echo'

			  <div class="col-12 col-md-6 col-lg-4">
				<div class="box box-body bg-hexagons-dark pull-up">
				  <div class="media align-items-center p-0">
					<div class="text-center">
					  <a href="#"><i class="cc USDT mr-5" title="wallet"></i></a>
					</div>
					<div>
					<h3 class="no-margin">youre referral cod is : '.$referral.'</h3>
					  
					</div>
				  </div>
				  <div class="flexbox align-items-center mt-25">
					<div>
					  <p class="no-margin"><a href="http://my.buynex.info/register?referral='.$referral.'">referral link</a></p>
					</div>
					
				  </div>
				</div>			
			  </div>
			  


<div class="col-12">


';


$student = new ManageStudents();
$fee = new ManageFees();



			
			
		
$discountList = $fee->GetreferalList($referral);			
			
echo'




 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">referral user list</h4>
			 		
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				
						
						
						
					<div style="'.$table_width.'">
						  <table class="table table-padded recent-order-list-table table-responsive-fix-big">
							<tr class="table_header default_font">
							';
				
					echo '
							<td style="width:120px;" class="small">
									<b>username</b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>name</b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>referral cod</b>
							</td>';
					
						
			
						
					echo '</tr>';
					///--Table Header
					$i=0;
					foreach($discountList as $discountProp)
					{
						if($i%2==0)
							$bgClass = "tr_hover_class";
						else
							$bgClass = "";
						echo '<tr style="height:30px; border-bottom:silver;" class="table_rows default_font '.$bgClass.'">';
				
						echo '<td style="text-align:center;">
							'.$discountProp['uusername'].'
							</td>';
						
						echo '<td style="text-align:center;">
							'.$discountProp['ufaname'].'
							</td>';
						
						
						echo '<td>
							<span class="label label-xl label-rounded label-warning">'.$discountProp['ucomment'].'</span>
							</td>';
							
							
							
						
					
							
							
						
						
						echo '</tr>';	
						$i++;				
					}
					echo '</table>
						
						
						
						
						
						
						</div>
						</div></div>



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





