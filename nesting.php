<?php

require_once('main.php');

$test=date("Y-m-d H:i:s");
$sum=date("Y-m-d H:i:s", strtotime($utimestampuserupdatee. ' + 1 minute'));
if($test < $sum){
$Failure=1;
}else{
	
sendemailverfy($llvm);
}
echo'

<br>'.$test.'<br>
<br>'.$sum.'<br>
<br>'.$Failure.'<br>
<br>'.$tre.'<br>
';
?>