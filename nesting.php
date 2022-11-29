<?php

require_once('main.php');
echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br/>'; 
$test=date("Y-m-d H:i:s");
$sum=date("Y-m-d H:i:s", strtotime($utimestampuserupdatee. ' + 1 minute'));
echo $test;
echo'<br>';


$datetime = new DateTime($sum);

$newfor=$datetime->format('Y-m-d H:i:s');
echo'<br>';

echo $newfor;
?>