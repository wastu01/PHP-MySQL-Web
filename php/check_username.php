<?php
require_once 'db.php';
require_once 'functions.php';

$check = check_has_username($_POST['n']);

if($check)
{
	//no
	echo 'yes';

}
else
{
	//可註冊
	echo 'no';
}


 ?>
