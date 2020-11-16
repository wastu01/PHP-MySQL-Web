<?php
@session_start();
$host = 'localhost';

$dbuser = 'id13986743_rootphp';
$dbpw = 'Ntcu-Php0000';
$dbname = 'id13986743_ntcuphp';

$_SESSION['link'] = mysqli_connect($host, $dbuser, $dbpw, $dbname);

if ($_SESSION['link'])
{

  mysqli_query($_SESSION['link'], "SET NAMES utf8");
  //echo "代表已正確連線";
  //參考youtube_ 動態網頁設計教學
}
else
{

  echo '無法連線mysql資料庫 :<br/>' . mysqli_connect_error();
}
?>
