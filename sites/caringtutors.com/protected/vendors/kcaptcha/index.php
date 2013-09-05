<?php
//error_reporting (E_ALL);
include('kcaptcha.php');  //print_r ($_REQUEST);//Yii::app()->end();
if(isset($_REQUEST['caringtutors'])){
	session_start();
}
$captcha = new KCAPTCHA();
if($_REQUEST['caringtutors']){  //echo 'key string:' .$_REQUEST[session_name()].$_SESSION['captcha_keystring'];Yii::app()->end();
	$_SESSION['captcha_keystring'] = $captcha->getKeyString();
}