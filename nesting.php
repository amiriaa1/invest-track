<?php

require_once('main.php');


$test=date("Y-m-d H:i:s");
$sum=date("Y-m-d H:i:s", strtotime($utimestampuserupdatee. ' + 1 minute'));
echo'

<br>alan: '.$test.'<br>
<br>jam kol: '.$sum.'<br>
<br>saat get sql: '.$utimestampuserupdatee.'<br>
';

if($test > $sum OR $utimestampuserupdatee==NULL)
{echo'mail send';}
else{
	echo'nashode';}
	
	




?>