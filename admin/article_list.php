 <?php

require_once '../php/db.php';
require_once '../php/functions.php';


if(!isset($_SESSION['is_login']) || !$_SESSION['is_login'])
{
	header("Location: login.php");
}

$datas = get_all_article();


 ?>

<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
  <head>
    <head>
    <title>後台文章列表</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <!--官方講解 grid規則有改 https://getbootstrap.com/docs/4.5/layout/grid/ -->

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="../css/index.css"/>
    <link rel="shortcut icon" href="../image/logo.ico">
  </head>

  </head>
  <body>
  <?php include_once 'nav.php'; ?>


  <div class="main">
    <div class="container">
      <div class="row">
        <div class="col-12 btn_area">
            <a href="article_add.php " class="btn btn-outline-danger btn-lg">新增文章</a>
        </div>
        <div class="col-12">

            <table class="table table-hover">
              <thead>
                <tr class="thead-dark">
                  <th scope="col">分類</th>
                  <th scope="col">標題</th>
                  <th scope="col">連結</th>
                  <th scope="col">是否發布</th>
                  <th scope="col">建立時間</th>
                  <th scope="col">管理動作</th>
                </tr>
              </thead>

              <tbody>

              <?php if (!empty($datas)):?>
                <?php foreach ($datas as $a_data ):?>


                <tr>
                  <th scope="row"><?php echo $a_data['category']; ?></th>
                  <td>            <?php echo $a_data['title']; ?></td>
                  <td>            <?php echo $a_data['content']; ?></td>

                  <td>            <?php echo ($a_data['publish'])?'發布中':'下架中';?></td>
                  <td>            <?php echo $a_data['create_date']; ?></td>
                  <td>
                    <a href='article_edit.php?i=<?php echo $a_data['id'];?>' class="btn btn-info">編輯</a>
                    <a href='javascript:void(0);' class="btn btn-danger del_article" data-id="<?php echo $a_data['id'];?>">刪除</a>
                  </td>
                </tr>

              <?php endforeach; ?>
              <?php else :?>
              <?php endif ;?>




                <tr>
                  <th scope="row" colspan="6">nooooooo</th>
                </tr>


              </tbody>
            </table>


        </div>






      </div>
    </div>
  </div>

<?php include_once 'footer.php' ;?>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>



  $("#article").on("submit", function(){

    $("a.del_article")

    /*

		if ($("#title").val() == '' || $("#content").val() == '') {
          alert("老師沒教你填寫區域不能空白嗎？");

      }
    else {
                $.ajax({
                  type : "POST",
                  url : "../php/update_article.php",
                  data : {
                    'id' : $("#id").val(),
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
											alert("更新成功");
										window.location.href="article_list.php";
									}
									else
									{
									    	alert("更新失敗"+ data);
									}

                }).fail(function(jqXHR, textStatus, errorThrown) {

                  alert("有錯誤產生，請看 console log");
                  console.log(jqXHR.responseText);
                });

      }

      return false;
    });
    */

</script>





  </body>
</html>
