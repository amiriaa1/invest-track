<?php

include_once('main.php');
$fee=new ManageFees();
$student = new ManageStudents();

$discountListcount = $fee->GetreferalListcodcount($ucomment);

if($discountListcount==1){
	
	$amount='1000';
investrefcod($ucomment,$uusername,$amount);



}
else{echo'no no ';}



?>