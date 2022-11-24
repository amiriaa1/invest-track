<?php


include_once('class.database.php');

class ManageStudents
 { public $link; function __construct()
 { global $table_prefix; $db_connection = new dbConnection(); $this->link = $db_connection->connect(); return $this->link; }
 
 
function AddStudent($aid,$uusername,$upass,$uactive,$uexpiration_date,$ufaname,$uemail,$umobile,$ucomment,$ureg_date)
 { global $table_prefix;
 $query = $this->link->prepare("INSERT INTO `".$table_prefix."users` (`aid`,`uusername`,`upass`,`uactive`,`uexpiration_date`,`ufaname`,`uemail`,`umobile`,`ucomment`,`ureg_date`) VALUES (?,?,?,?,?,?,?,?,?,?) ");

 $values = array($aid,$uusername,$upass,$uactive,$uexpiration_date,$ufaname,$uemail,$umobile,$ucomment,$ureg_date);
 $query->execute($values); $counts = $query->rowCount();
 return $counts; }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 function UpdateStudent($uusername,$ucurrent_major,$uactive,$uexpiration_date,$ufname,$ulname,$ufaname,$uemail,$ugender,$ustatus,$ubirthdate,
 $ucardid,$ucard_place,$udegree, $umajor,$uarmy_status,$ujob,$uskills,$uhome_address,$uhome_zipcode,$uhome_tel ,$uwork_address,$uwork_zipcode,
 $uwork_tel,$umobile,$uparent_mobile,$uparent_email,$upic,$ureg_date,$unewsletter,$ucomment,$uid)
 { global $table_prefix;
 $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `uusername`=?, `ucurrent_major`=?, `uactive`=?, `uexpiration_date`=?, `ufname`=?, `ulname`=?, `ufaname`=?, `uemail`=?, `ugender`=?, `ustatus`=?, `ubirthdate`=?, `ucardid`=?, `ucard_place`=?, `udegree`=?, `umajor`=?, `uarmy_status`=?,`ujob`=?,`uskills`=?,`uhome_address`=?,`uhome_zipcode`=?, `uhome_tel`=?,`uwork_address`=?, `uwork_zipcode`=?,`uwork_tel`=?, `umobile`=?, `uparent_mobile`=?, `uparent_email`=?, `upic`=?, `ureg_date`=?, `unewsletter`=?, `ucomment`=? WHERE `uid`=?");
 $values = array($uusername,$ucurrent_major,$uactive,$uexpiration_date,$ufname,$ulname,$ufaname,$uemail,$ugender,$ustatus,$ubirthdate,
 $ucardid,$ucard_place,$udegree, $umajor,$uarmy_status,$ujob,$uskills,$uhome_address,$uhome_zipcode,$uhome_tel ,
 $uwork_address,$uwork_zipcode,$uwork_tel,$umobile,$uparent_mobile,$uparent_email,$upic,$ureg_date,$unewsletter,$ucomment,$uid);
 $query->execute($values); $counts = $query->rowCount();
 return $counts; } 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 function UpdateParentStudent($uparent_mobile,$uparent_email,$uid)
 { global $table_prefix; $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `uparent_mobile`=?, `uparent_email`=? WHERE `uid`=?");
 $values = array($uparent_mobile,$uparent_email,$uid);
 $query->execute($values); $counts = $query->rowCount();
 return $counts; } 
 
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function GetStudentList($query) { global $table_prefix;
 if (!preg_match('/ORDER/i', $query)) $order = "ORDER BY `uid` DESC"; 
 else $order = "";
 $query = $this->link->query("SELECT * FROM `".$table_prefix."users` $query $order");
 $counts = $query->rowCount(); $result = $query->fetchAll();
 return $result; }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////



 function GetStudenuusername($username) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uusername`=?");

 $values = array($uusername);
 $query->execute($values);
 $counts = $query->rowCount();
 if($counts==1) { $result = $query->fetchAll(); return $result; } 
 else { return $counts; } } 

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 
function GetUserinvestlistcron($query1) { global $table_prefix; $tids=implode(',', $tids); $query = $this->link->prepare("SELECT * FROM `nim_invest` WHERE `aactive`=?"); $values = array($query1); $query->execute($values); $result = $query->fetchAll(); return $result; } 



 function GetStudentList2($query,$start,$limit) { global $table_prefix;
 if (!preg_match('/ORDER/i', $query)) $order = "ORDER BY `uid` DESC";
 else $order = "";
 if($start==NULL && $limit==NULL) $query = $this->link->query("SELECT * FROM `".$table_prefix."users` $query $order");
 else $query = $this->link->query("SELECT * FROM `".$table_prefix."users` $query $order LIMIT $start,$limit");
 $counts = $query->rowCount(); $result = $query->fetchAll();
 return $result; }
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 function GetNumOfStudents($query) { global $table_prefix; $query = $this->link->query("SELECT count(*) As c FROM `".$table_prefix."users` $query");
 $result = $query->fetchAll();
 return $result[0]['c']; } 
 
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function LoginStudent($username,$password)
{ global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uusername`=? AND `upass`=?");
 $values = array($username,$password); $query->execute($values); $counts = $query->rowCount();
 return $counts; }
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 function LoginParentStudent($username,$password)
 { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uusername`=? AND `uparent_pass`=?");
 $values = array($username,$password); $query->execute($values); $counts = $query->rowCount();
 return $counts; }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 function GetUserInfo($username) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uusername`=?");

 $values = array($uusername);
 $query->execute($values);
 $counts = $query->rowCount();
 if($counts==1) { $result = $query->fetchAll(); return $result[0]; } 
 else { return $counts; } } 
 
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 function UsernameAvailability($username)
 
 { global $table_prefix; if(empty($uusername))
	 
	 { $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uusername`=?");
	 
 $values = array($username); $query->execute($values); $counts = $query->rowCount(); 

 
 if($counts==1) return 0; else return 1; } else { return 2; } } 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 function GetStudentInfo($uusername) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uusername`=?");
 $values = array($uusername); $query->execute($values); $counts = $query->rowCount(); if($counts==1) { $result = $query->fetchAll(); return $result[0];
 } else { return $counts; } } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function GetStudentInfoById($uid) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uid`=?");
 $values = array($uid); $query->execute($values); $counts = $query->rowCount(); if($counts==1) { $result = $query->fetchAll(); return $result[0];
 } else { return $counts; } } 
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function GetStudentInfoBySCode($uusername)
 { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uusername`=?");
 $values = array($uusername); $query->execute($values); $counts = $query->rowCount();
 if($counts==1) { $result = $query->fetchAll(); return $result[0]; } else { return $counts; } } 
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function LastStudentID()
 { global $table_prefix; $query = $this->link->query("SELECT `uid` FROM `".$table_prefix."users` ORDER BY `uid` DESC LIMIT 0,1");
 $result = $query->fetchAll(); return $result[0]['uid']; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function Username2UID($uusername)
 { global $table_prefix; $query = $this->link->query("SELECT `uid` FROM `".$table_prefix."users` WHERE `uusername`='$uusername'");
 $result = $query->fetchAll(); return $result[0]['uid']; } 
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function DeleteStudent($uid) { global $table_prefix; $query = $this->link->prepare("DELETE FROM `".$table_prefix."users` WHERE `uid`=?");
 $values = array($uid); $query->execute($values); $counts = $query->rowCount(); if($counts==1) return 1; else return $counts; } 
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
function ResetPassword($uid,$upass)
 { global $table_prefix; $upass = md5($upass); $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `upass`=? WHERE `uid`=?");
 $values = array($upass,$uid); $query->execute($values); $counts = $query->rowCount(); return $counts; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function ParentResetPassword($uid,$upass)
 { global $table_prefix; $upass = md5($upass); $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `uparent_pass`=? WHERE `uid`=?");
 $values = array($upass,$uid); $query->execute($values); $counts = $query->rowCount(); return $counts; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function UserParentResetPassword($email,$upass)
 { global $table_prefix; $upass = md5($upass);
 $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `uparent_pass`=? WHERE `uparent_email`=?");
 $values = array($upass,$email); $query->execute($values); $counts = $query->rowCount(); return $counts; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 function UsetTwoFactorupdate($mobile)
 { global $table_prefix; 
 $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `uactive`=1 WHERE `uusername`=?");
 $values = array($mobile); $query->execute($values); $counts = $query->rowCount(); return $counts; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 function UserResetPassword($email,$upass)
 { global $table_prefix; $upass = md5($upass); $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `upass`=? WHERE `uemail`=?");
 $values = array($upass,$email); $query->execute($values); $counts = $query->rowCount(); return $counts; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function ChangePassword($uid,$current_pass,$new_pass) { global $table_prefix; $current_pass = md5($current_pass); $new_pass = md5($new_pass);
 $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uid`=? AND `upass`=?"); $values = array($uid,$current_pass);
 $query->execute($values); $counts = $query->rowCount(); if($counts==1)
	 { $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `upass`=? WHERE `uid`=?");
 $values = array($new_pass,$uid); $query->execute($values); $counts = $query->rowCount(); if($counts==1) return 2; else return 3; } else return 1; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function ParentChangePassword($uid,$current_pass,$new_pass) { global $table_prefix; $current_pass = md5($current_pass); $new_pass = md5($new_pass);
 $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uid`=? AND `uparent_pass`=?"); $values = array($uid,$current_pass);
 $query->execute($values); $counts = $query->rowCount(); if($counts==1)
	 { $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `uparent_pass`=? WHERE `uid`=?"); $values = array($new_pass,$uid);
 $query->execute($values); $counts = $query->rowCount(); if($counts==1) return 2; else return 3; } else return 1; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function GetStudentTermList($uid)
 { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."terms` WHERE `".$table_prefix."terms`.`tid` In (SELECT `".$table_prefix."courses`.`tid` from `".$table_prefix."course_student` INNER JOIN `".$table_prefix."courses` ON `".$table_prefix."course_student`.`cid`=`".$table_prefix."courses`.`cid` INNER JOIN `".$table_prefix."terms` ON `".$table_prefix."courses`.`tid` = `".$table_prefix."terms`.`tid` WHERE `".$table_prefix."course_student`.`uid`=?) ORDER BY `".$table_prefix."terms`.`tid` DESC");

 $values = array($uid); $query->execute($values); // $query = $this->link->query("SELECT * FROM ".$table_prefix."users WHERE uid='$uid'");
 $counts = $query->rowCount(); $result = $query->fetchAll(); return $result; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function GetStudentCourseList($uid,$tid)
 { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."course_student` INNER JOIN `".$table_prefix."users` ON `".$table_prefix."course_student`.`uid`=`".$table_prefix."users`.`uid` INNER JOIN `".$table_prefix."courses` ON `".$table_prefix."course_student`.`cid`=`".$table_prefix."courses`.`cid` INNER JOIN `".$table_prefix."classes` ON `".$table_prefix."courses`.`clid`=`".$table_prefix."classes`.`clid` INNER JOIN `".$table_prefix."lessons` ON `".$table_prefix."courses`.`lid`=`".$table_prefix."lessons`.`lid` INNER JOIN `".$table_prefix."teachers` ON `".$table_prefix."courses`.`pid`=`".$table_prefix."teachers`.`pid` INNER JOIN `".$table_prefix."terms` ON `".$table_prefix."courses`.`tid`=`".$table_prefix."terms`.`tid` WHERE `".$table_prefix."course_student`.`uid`=? AND `".$table_prefix."terms`.`tid`=? ORDER BY `".$table_prefix."courses`.`ccode`");
 $values = array($uid,$tid); $query->execute($values); $counts = $query->rowCount(); $result = $query->fetchAll();
 return $result; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function DelPic($id) { global $table_prefix; $studentInfo = $this->GetStudentInfoById($id);
 if(file_exists('../img/students/'.$studentInfo['uid'].$studentInfo['upic'])) 
 { if(unlink('../img/students/'.$studentInfo['uid'].$studentInfo['upic'])) return 1; else return 0; } else return 1; } 

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function RenamePic($uid) { global $table_prefix; $studentInfo = $this->GetStudentInfoById($uid); 
if(file_exists('../img/students/'.$studentInfo['upic'])) 
{ if(rename('../img/students/'.$studentInfo['upic'],'../img/students/'.$studentInfo['uid'].'-'.$studentInfo['upic'])) 
{ $new_name='-'.$studentInfo['upic']; $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `upic`=? WHERE `uid`=?");
 $values = array($new_name,$uid); $query->execute($values); return 1; } 
 else echo $studentInfo['uusername'].' '.$studentInfo['ufname'].' '.$studentInfo['ulname'].': '._IMAGE_NOT_FOUND; } else return 1; } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function SendResetLink($email)
 { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uemail`=?");
 $values = array($email); $query->execute($values); $counts = $query->rowCount(); if($counts==1)
	 { $result = $query->fetchAll(); return substr($result[0]['upass'],5,20); } else { return 0; } } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function SendParentResetLink($email)
 { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uparent_email`=?"); $values = array($email);
 $query->execute($values); $counts = $query->rowCount(); if($counts==1) { $result = $query->fetchAll(); return substr($result[0]['uparent_pass'],5,20);
 } else { return 0; } } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function GetNewsletterMembers() { global $table_prefix; $query = $this->link->query("SELECT * FROM `".$table_prefix."users` WHERE `unewsletter`=1");
 $counts = $query->rowCount(); if($counts>0) { return $query->fetchAll(); } else { return 0; } } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function CalculateAve($tid,$uid)
 { global $table_prefix; $query = $this->link->prepare("SELECT sum(`grade`*`factor`)/sum(`factor`) AS `ave` FROM `".$table_prefix."course_student` INNER JOIN `".$table_prefix."users` ON `".$table_prefix."course_student`.`uid`=`".$table_prefix."users`.`uid` INNER JOIN `".$table_prefix."courses` ON `".$table_prefix."course_student`.`cid`=`".$table_prefix."courses`.`cid` INNER JOIN `".$table_prefix."classes` ON `".$table_prefix."courses`.`clid`=`".$table_prefix."classes`.`clid` INNER JOIN `".$table_prefix."lessons` ON `".$table_prefix."courses`.`lid`=`".$table_prefix."lessons`.`lid` INNER JOIN `".$table_prefix."teachers` ON `".$table_prefix."courses`.`pid`=`".$table_prefix."teachers`.`pid` INNER JOIN `".$table_prefix."terms` ON `".$table_prefix."courses`.`tid`=`".$table_prefix."terms`.`tid` WHERE `".$table_prefix."course_student`.`uid`=? AND `".$table_prefix."terms`.`tid`=? AND `".$table_prefix."lessons`.`eff_on_term_avg`!=0 AND `grade`!='' ORDER BY `".$table_prefix."lessons`.`lname`");
 $values = array($uid,$tid); $query->execute($values); $result = $query->fetchAll(); return round($result[0]['ave'],2); } 
 
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 function CalculateTotalAve($uid)
 { global $table_prefix; $query = $this->link->prepare("SELECT sum(`grade`*`factor`)/sum(`factor`) AS `ave` FROM `".$table_prefix."course_student` INNER JOIN `".$table_prefix."users` ON `".$table_prefix."course_student`.`uid`=`".$table_prefix."users`.`uid` INNER JOIN `".$table_prefix."courses` ON `".$table_prefix."course_student`.`cid`=`".$table_prefix."courses`.`cid` INNER JOIN `".$table_prefix."classes` ON `".$table_prefix."courses`.`clid`=`".$table_prefix."classes`.`clid` INNER JOIN `".$table_prefix."lessons` ON `".$table_prefix."courses`.`lid`=`".$table_prefix."lessons`.`lid` INNER JOIN `".$table_prefix."teachers` ON `".$table_prefix."courses`.`pid`=`".$table_prefix."teachers`.`pid` INNER JOIN `".$table_prefix."terms` ON `".$table_prefix."courses`.`tid`=`".$table_prefix."terms`.`tid` WHERE `".$table_prefix."course_student`.`uid`=? AND `".$table_prefix."lessons`.`eff_on_total_avg`!=0 AND `grade`!='' ORDER BY `".$table_prefix."lessons`.`lname`"); $values = array($uid); $query->execute($values); $result = $query->fetchAll();

 return round($result[0]['ave'],2); } 
 
 } 




?>