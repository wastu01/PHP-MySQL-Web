<?php
require_once 'db.php';
require_once 'functions.php';


header('Content-Type: applecation/json; charset=utf-8');

$json = array(
	"result" => false,
	"msg" => '登入失敗，請確認帳密'
);
//執行驗證的方法，把帳密帶入，因為會回傳一個值，所以也可以直接寫在if判別中，不用再另外寫變數
if(verify_user($_POST['un'], $_POST['pw']))
{
	//若為true 代表登入成功
	$json['result'] = true;
	$json['msg'] = "驗證成功";

}
//輸出 json 格式
echo json_encode($json);
 ?>
