<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
  <head>
    <head>
    <title>註冊會員</title>
    <meta name="description" content="數位系學生創作網站">
    <meta name="author" content="陳某，王某，蔡某 ">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
    <!--官方講解 grid規則有改 https://getbootstrap.com/docs/4.5/layout/grid/ -->

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
     <link rel="stylesheet" href="css/index.css"/>
    <link rel="shortcut icon" href="image/logo.ico">
  </head>

  </head>
  <body>
  <?php include_once 'nav.php'; ?>


  <div class="row justify-content-center">
    <div class="col-md-8">
      <span class="anchor" id="formRegister"></span>
      <hr class="mb-5">
      <!-- form card register -->
      <div class="card card-outline-secondary">
        <div class="card-header">
          <h3 class="mb-0">登登登登入入入入-LOGIN</h3>
        </div>
        <div class="card-body">
              <form autocomplete="off" id="register_form" method="post" action="php/add_member.php" >
                <div class="form-group">
                  <label for="username">帳號</label>
                  <input class="form-control" list="datalistOptions" name="username" id="username" placeholder="輸入你ㄉ帳號啦" required="" type="text">
                  <datalist id="datalistOptions">
                    <option value="123">
                    <option value="請點樓上">
                    <option value="不要點我">
                    <option value="因為帳號不能中文">
                    <option value="謝謝您的配合">
                  </datalist>
                </div>

                <div class="form-group">
                  <label for="password" id="password_label1">密碼</label>
                  <input class="form-control" name="password" id="password" placeholder="密碼給我key上來" required="" type="password">
                  <small class="form-text text-muted" id="passwordisnotlimited_justkidding"><p>根據我們自己制定的政策，您的 ID 必須使用高強度密碼。密碼必須有 8 個或以上的字元，並包含大寫和小寫字母，以及至少一個數字。您也可以加上額外的字元和標點
                    符號，進一步提高密碼的強度。以上您都不用遵守，因為正規表達式沒有做（白話文：密碼隨便你取）</p></small>
                </div>
                <div class="form-group">

                  <label for="confirm_password" id="password_label2">確認密碼</label>
                  <input class="form-control" id="confirm_password" placeholder="密碼再確認一次" required="" type="password">
                      <?php

                      echo "<p class='error'></p>";

                      ?>
                </div>

                <div class="form-group">
                  <label for="name">暱稱</label>
                  <input class="form-control" name="name" id="name" placeholder="輸入你ㄉ暱稱啦" required="" type="text">
                </div>
                <div class="form-group">
                  <button class="btn btn-success btn-lg float-right" type="submit">確認送出</button>
                </div>
              </form>
        </div>
      </div><!-- /form card register -->
    </div>
  </div>

<?php include_once 'footer.php' ;?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).on("ready", function() {
      $("#username").on("keyup", function(){
        if($(this).val() != '')
        {
          //不是空的才檢查
          console.log($(this).val())

          $.ajax({
            type : "POST",
            url : "php/check_username.php",
            data : {
              'n' : $(this).val()
            },
            dataType : 'html' //設定該網頁回應的會是 html 格式
          }).done(function(data) {
            if (data == "yes") {
              //很抱歉，此帳號名稱已存在，請你更名
              alert('很抱歉，此帳號名稱已存在，請你更名')

              $("#username").removeClass("form-control is-valid").addClass("form-control is-invalid");


              $("#register_form button").attr('disabled',true);
            }
            else {
              $("#username").removeClass("form-control is-invalid").addClass("form-control is- valid");

                $("#register_form button").attr('disabled',false);
              //可以註冊哦
            }
            console.log(data); //透過 console 看回傳的結果

          }).fail(function(jqXHR, textStatus, errorThrown) {
            //失敗的時候
            alert("有錯誤產生，請看 console log");
            console.log(jqXHR.responseText);
          });






        }
        else {
          //no check
          $("#username").removeClass("form-control is-valid").removeClass("form-control is-invalid");

        }


      });

    //取得輸入的值





  $("form").on("submit", function(){
    if ($("#password").val() != $("#confirm_password").val()) {
      $("#password").addClass("form-control is-invalid");
      $("#password_label1").addClass("text-danger");
      $("#password_label2").addClass("text-danger");

      $("#confirm_password").addClass("form-control is-invalid");




      alert("兩次密碼輸入不一樣，請確認");
      //false 不要把資料送出去。

    }
    else {
      //別懷疑你密碼真的打對了～
      $.ajax({
        type : "POST",
        url : "php/add_user.php",
        data : {
          'un' : $("#username").val(),
          'pw' : $("#password").val(),
          'n' : $("#name").val()

        },
        dataType : 'html'
      }).done(function(data) {
          console.log(data);
          //console 看回傳哪裡出錯
        if (data == "yes") {

          alert('恭喜註冊成功，將前往神秘後台')
	         window.location.href="admin/index.php";

        }
        else {
        	alert("註冊失敗，請自行解決或找專業人員，我也不知道該怎麼辦");
        }


      }).fail(function(jqXHR, textStatus, errorThrown) {
        //失敗的時候
        alert("看一下console log");
        console.log(jqXHR.responseText);
      });


    }
      return false;
  });
});
</script>



  </body>
</html>
