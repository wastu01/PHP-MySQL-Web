<?php

require_once '../php/db.php';

if(isset($_SESSION['is_login']) && $_SESSION['is_login'])
{
    ob_start();
  header("Location: index.php");
    ob_end_flush();
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>會員登入</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/index.css"/>
    <link rel="shortcut icon" href="../images/favicon.ico">
  </head>

  <body>


    <div class="content">
      <div class="container">

        <div class="row">

          <div class="col-xs-12 col-sm-4 col-sm-offset-4">
            <h2>會員登入</h2>
            <form autocomplete="off" class="login" id="login_form" method="post" action="php/add_member.php" >
              <div class="form-group">
                <label for="username">帳號</label>
                <input class="form-control" name="username" id="username" placeholder="輸入你ㄉ帳號啦" required="" type="text">
              </div>

              <div class="form-group">
                <label for="password" id="password_label1">密碼</label>
                <input class="form-control" name="password" id="password" placeholder="密碼給我key上來" required="" type="password">
              </div>


              <div class="form-group">
                <button class="btn btn-success btn-lg float-right" type="submit">確認送出</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- 在表單送出前，檢查確認密碼是否輸入一樣 -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>



				$("#login_form").on("submit", function(){

	      		$.ajax({
			        type : "POST",
			        url : "../php/verify_user.php",
			        data : {
			          un : $("#username").val(),
			          pw : $("#password").val()

			        },
			        dataType : 'json' //改用 json
			      }).done(function(data) {
			        //成功的時候
              console.log(data);

			        if(data.result)
			        {
			        	window.location.href="index.php";
			        }
			        else
			        {
			        	alert(data.msg + data);
			        }

			      }).fail(function(jqXHR, textStatus, errorThrown) {

			      	alert("有錯誤產生，請看 console log");
			        console.log(jqXHR.responseText);
			      });




          return false;
				});

    </script>
    <!-- 頁底 -->
    <?php
      include_once 'footer.php';
    ?>
  </body>
</html>
