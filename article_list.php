<?php

require_once 'php/db.php';

require_once 'php/functions.php';

$datas = get_publish_article();


?>

<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
  <head>
    <head>
    <title>所有文章</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <!--官方講解 grid規則有改 https://getbootstrap.com/docs/4.5/layout/grid/ -->

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="css/index.css"/>
    <link rel="shortcut icon" href="image/logo.ico">
  </head>

  </head>
  <body>
    <?php include_once 'nav.php'; ?>


			<div class="main">
			<div class="container">
			  <div class="card">

          <?php if(!empty($datas)):?>
            <?php foreach($datas as $article):?>

                    <div class="card-header text-center"><h2><?php echo $article['title']; ?></h2></div>
                    <div class="card-body">
                    <h4 class="badge badge-secondary">撰寫日期：<?php echo $article['create_date']; ?></h4>
                    <?php
                      $abstract = strip_tags($article['content']);
                      //取得100個字
                      $abstract = mb_substr($abstract, 0, 40, "UTF-8")
                    ?>
                          <div class="card-text">  <?php echo $abstract ?> <a href="article.php?p=<?php echo $article['id']; ?>">.......完整文章請加入會員）x</a>

                          <hr>
                          </div>

                          <a class="card-link" href="<?php echo $article['link']; ?>" target="_blank">文章來源請點我，僅供學習用途，若有侵權，還請告知將會下架文章 </a>
                              <!-- 偷懶直接放外部連結 -->


                      </div>
                      <div class="card-footer">

                        <span class="badge badge-pill badge-dark">標籤：<?php echo $article['category']; ?></span>
                    <!-- <span class="badge badge-pill badge-default">顏色與背景same</span> -->
                    <!-- <span class="badge badge-pill badge-info">迷因</span>
                      <span class="badge badge-pill badge-dark">暗黑</span> -->

                       </div>


            <?php endforeach; ?>
            <?php endif; ?>

			  </div>
			</div>
			</div>


<?php include_once 'footer.php' ;?>




  </body>
</html>
