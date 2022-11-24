<?php

require_once('../config.php');
$excel=0;
$border=1;
ini_set('session.cookie_httponly',true);
session_start();
$cookie = (isset($_COOKIE[$admin_session_name])?1:0);
if($cookie==0)
{
	//Protecting against SESSION Hijaking
	if(isset($_SESSION['user_last_ip'])===false)
	{
		$_SESSION['user_last_ip'] = $_SERVER['REMOTE_ADDR'];
	}
	if($_SESSION['user_last_ip'] !== $_SERVER['REMOTE_ADDR'])
	{
		session_unset();
		session_destroy();
	}
	//--End of Protecting against SESSION Hijaking
}

$isLogedIn = ($cookie==0?isset($_SESSION[$admin_session_name]):isset($_COOKIE[$admin_session_name]));


if (!$isLogedIn && !preg_match("/login/i", $_SERVER['REQUEST_URI']))
{
	$redirect = explode('/',$_SERVER['REQUEST_URI']);
	$redirect = $redirect[count($redirect)-1];
	if($redirect=="")
	{
		header("Location: login"); exit;
	}
	else
	{
		header("Location: login?redirect=".urlencode($redirect).""); exit;
	}
}

include_once('../include/class.database.php');
$db_connection = new dbConnection();
if(!($db_connection->connect()))
	header('Location: ../install');

include_once('../include/class.settings.php');
$settings_class = new ManageSettings();
$system_settings = $settings_class->SystemSettings();
$dir = $system_settings["dir"];
$theme = $system_settings["theme"];
$language = $system_settings["language"];
$jamaa_active = $system_settings["jamaa_active"];
$files_final_size = $system_settings["files_final_size"];
$bulk_email = $system_settings["bulk_email"];
$maintenance = $system_settings["maintenance"];
$system_title = $system_settings["system_title"];
$institute_name = $system_settings["institute_name"];
$allow_user_modify_profile = $system_settings["allow_user_modify_profile"];
$uusername_title = $system_settings["uusername_title"];
$admins_message = stripcslashes($system_settings["admins_message"]);
$maintenance_pm = stripcslashes($system_settings["maintenance_pm"]);
$sms_admin_addpaymen = $system_settings["sms_admin_addpaymen"];
$maintenance = $system_settings["maintenance"];
$sms_admin_login = $system_settings["sms_admin_login"];
$wallet_status = $system_settings["wallet_status"];
if ($dir =="ltr")
{
	$align1 = "right";
	$align2 = "left";
}
else
{
	$align1 = "left";
	$align2 = "right";
}

include_once('../include/jdf.php');
include_once('../include/functions.php');
include_once('../language/'.$language.'.php');
include_once('../include/class.admin.php');
include_once('../include/class.student.php');
include_once('../include/class.teacher.php');
include_once('../include/class.term.php');
include_once('../include/class.class.php');
include_once('../include/class.level.php');
include_once('../include/class.major.php');
include_once('../include/class.score_column.php');
include_once('../include/class.unit.php');
include_once('../include/class.fee.php');
include_once('../include/class.lesson.php');
include_once('../include/class.course.php');
include_once('../include/class.objection.php');
include_once('../include/class.course-student.php');
include_once('../include/class.homework.php');
include_once('../include/class.pm.php');
$admin = new ManageAdmins();
$pm = new ManagePMs();
if($isLogedIn)
{
	if($cookie==0)
	{
		if(!$admin->LoginAdmin($_SESSION[$admin_session_name],$_SESSION[$admin_password_session_name]))
			header ('Location: logout');
		$ausername = $_SESSION[$admin_session_name];
	}
	else
	{
		if(!$admin->LoginAdmin($_COOKIE[$admin_session_name],$_COOKIE[$admin_password_session_name]))
			header ('Location: logout');
		$ausername = $_COOKIE[$admin_session_name];
	}
	$adminProp = $admin->GetAdminInfo($ausername);
	$aid = $adminProp['aid'];
}
$table_width=$success=$error="";
?>