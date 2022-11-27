<?php

include_once('main.php');

$test=date("Y-m-d H:i:s");
$sum=date("Y-m-d H:i:s", strtotime($utimestampuserupdatee. ' + 5 minute'));


echo $test;

echo'

<br>
'.$sum.'
';

if($utimestampuserupdatee > $sum){
	
	
	echo'no';
}
else{echo'yes';}


?>