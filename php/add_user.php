<?php
require_once 'db.php';
require_once 'functions.php';

$check = add_user($_POST['un'],$_POST['pw'],$_POST['n']);

if($check)
{
	echo 'yes';
}
else
{
	//若為 null 或者 false 代表沒有使用者，可以註冊
	echo 'no';
}


 ?>
