<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');


$fee=new ManageFees();

$userPayments = $fee->GetUserinvestlist($uusername);



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
								  <th class="text-warning">amount</th>
								  <th class="text-warning">finish date</th>
								  <th class="text-warning">invest pack number</th>
								  <th class="text-warning">interest rate</th>
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
									'.$userPayment['amount'].'
									</a>
									
								  </td>
								  
								  ';
								$comment=$userPayment['expdate'];
								$atimestamp=$userPayment['atimestamp'];
								  $test=date("Y-m-d");
                                   $sum=date('Y-m-d', strtotime($atimestamp. ' + '.$comment.' days'));

								  
								  echo'
								  <td>'.$sum.'</td>
								  <td>
									<time class="timeago" >'.$userPayment['investpack'].'</time>
								  </td>
								  <td>'.$userPayment['intrest'].'</td>
								  
								  ';
								  if($userPayment['aactive']==1){
									echo'<td><span class="label label-success">active</span></td>';  
									  
								  }
								  
								  else{
									 echo'<td><span class="label label-warning">finish</span></td>';   
									  
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