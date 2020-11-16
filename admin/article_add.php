<?php
require_once '../php/db.php';
require_once '../php/functions.php';


if(!isset($_SESSION['is_login']) || !$_SESSION['is_login'])
{
	  ob_start();
	header("Location: login.php");
	  ob_end_flush();
}

// $datas = get_all_article();


 ?>

<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
  <head>

    <title>後台文章新增</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <!--官方講解 grid規則有改 https://getbootstrap.com/docs/4.5/layout/grid/ -->

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="../css/index.css"/>
    <link rel="shortcut icon" href="../image/logo.ico">

    <style>


       </style>
  </head>
  <body>
  <?php include_once 'nav.php'; ?>


  <div class="main">
    <div class="container">


          <form id="article">
             <h2>新增文章：</h2>
             <div class="row">
               <div class="col-md-6">
                 <div class="form-group">
                   <label for="first">標題</label>
                   <input type="text" class="form-control" placeholder="" id="title">
                 </div>
               </div>
               <!--  col-md-6   -->

               <div class="col-md-6">
                 <div class="form-group">
                   <label for="last">分類</label>
                   <select class="custom-select" id="category">
                    <option value="新聞評論" >新聞評論</option>
                    <option value="國際時事" >國際時事</option>

                  </select>

                 </div>
               </div>
               <!--  col-md-6   -->
             </div>


             <div class="row">
               <div class="col-md-12">
                 <div class="form-group">
                   <label for="content">內文</label>
                   <textarea rows="7" style="height:100%" class="form-control" placeholder="產出U質好文章" id="content"></textarea>
                   <textarea rows="2" style="height:100%" class="form-control" placeholder="文章原始出處" id="link"></textarea>

                 </div>
               <div class="form-group">
                              <label for="publish">發布</label>
                              <div class="radio">
                                <label>
                              <input type="radio" name="publish" value="1" checked>發布
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="publish" value="0" >不發布
                                </label>
                              </div>

                              <label for="newsletter">訂閱我們，開啟小勾勾</label>
                              <div class="checkbox">

                              <label>
                                  <input type="checkbox" value="sub" id="newsletter">訂閱！！！
                                </label>
                              </div>
              </div>


                              <button type="submit" class="btn btn-primary">存檔</button>

               </div>



             </div>
				</div>
             <!--  row   -->
		</form>


        </div>

  </div>

<?php include_once 'footer.php' ;?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>



  $("#article").on("submit", function(){

		if ($("#title").val() == '' || $("#content").val() == '') {
          alert("老師沒教你填寫區域不能空白嗎？");

      }
    else {

                $.ajax({
                  type : "POST",
                  url : "../php/add_article.php",
                  data : {
                    'title' : $("#title").val(),
                    'category' : $("#category").val(),
                    'content' : $("#content").val(),
                    'link' : $("#link").val(),

                    'publish' : $("input[name='publish']:checked").val()


                  },
                  dataType : 'html'
                }).done(function(data) {
									// console.log(data);

									if(data == "yes")
									{
											alert("新增成功");
										window.location.href="article_list.php";
									}
									else
									{
									    	alert(data.msg + data);
									}

                }).fail(function(jqXHR, textStatus, errorThrown) {

                  alert("有錯誤產生，請看 console log");
                  console.log(jqXHR.responseText);
                });

      }

      return false;
    });

</script>



  </body>
</html>
