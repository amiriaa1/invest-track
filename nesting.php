<?php

require_once('main.php');
date_default_timezone_set('Europe/London');
echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br/>'; 
$test=date("Y-m-d H:i:s");
$sum=date("Y-m-d H:i:s", strtotime($utimestampuserupdatee. ' + 1 minute'));
echo $test;
echo'<br>';


$date = new DateTime($sum);
$date->setTimezone(new DateTimeZone('Europe/London'));
echo $date->format('Y-m-d H:i:sP') . "\n";
?>