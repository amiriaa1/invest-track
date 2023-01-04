<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');


$fee=new ManageFees();

$userPayments = $fee->GetUserPayments($uid);



echo'



		    
			  
				  <div class="box">
					<div class="box-header with-border">
					  <h4 class="box-title">Latest Transactions</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table no-margin table-hover">
							  <thead>					
								<tr class="bg-dark">
								  <th class="text-warning">Transaction Hash</th>
								  <th class="text-warning">USDT</th>
								  <th class="text-warning">Time</th>
								  <th class="text-warning">Miner Preference</th>
								  <th class="text-warning">Status</th>
								</tr>
							  </thead>
							  <tbody>
							
								
							
								';
								foreach ($userPayments as $userPayment) {
								
								echo'
								
							
								<tr>
								  <td>
									<a href="/transactions-List?op='.$userPayment['upid'].'" class="text-warning hover-warning">
									'.$userPayment['uptrack_code'].'
									</a>
									
								  </td>
								  <td>'.$userPayment['uppayment'].'</td>
								  <td>
									<time class="timeago" >'.$userPayment['update'].'</time>
								  </td>
								  <td>'.$userPayment['upcomment'].'</td>
								  
								  ';
								  if($userPayment['walletacc']==10){
									echo'<td><span class="label label-success">deposit</span></td>';  
									  
								  }
								  
								  else{
									 echo'<td><span class="label label-warning">withdrawal</span></td>';   
									  
								  }
								  echo'
								  
								  
								  
								</tr>
								
							
								';
								}
								echo'
							  </tbody>
							</table>
						</div>
					</div>
				 </div>
			  


';




include_once('footer.php');

?>