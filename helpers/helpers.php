<?php
define('APPROOT',dirname(dirname(__FILE__)));
define('URLROOT','http://localhost/school');
function isLogin(){
	if(isset($_SESSION['id']))
		return true;
	else
		return false;
}
function isAdmin(){
	if($_SESSION['user_type']=='admin')
		return true;
	else
		return false;
}
