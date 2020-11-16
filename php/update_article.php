<?php
require_once 'db.php';
require_once 'functions.php';

$check = update_article($_POST['id'],$_POST['title'],$_POST['category'],$_POST['content'],$_POST['link'],$_POST['publish']);

if($check)
{

	 echo 'yes';
}

else {
	echo 'no';
}


 ?>
