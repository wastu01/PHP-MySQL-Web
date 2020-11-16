<?php

require_once 'php/db.php';

require_once 'php/functions.php';

$datas = get_publish_work();


?>

<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
  <head>
    <head>
    <title>所有作品</title>
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
        <div class="row">


              <!-- 標籤沒辦法 RWD 不相符，問題待解or 算了沒人會發現 -->
            <?php if(!empty($datas)):?>
              <?php foreach($datas as $a_work):?>
                <div class="col-xs-12 col-sm-4">
                <div class="card-group">
                    <?php if($a_work['image_path']):?>

                      <img src="<?php echo $a_work['image_path'];?>" alt="moon" class="img-fluid">

                    <?php else:?>
                      <div class="embed-responsive embed-responsive-16by9">
                      <video src="<?php echo $a_work['video_path'];?>" controls></video>
                      </div>
                      <?php endif;?>
                    </div>


                  <div class="card">

                    <div class="card-body">
                      <h5 class="card-title"><?php echo $a_work['intro']; ?></h5>

                        <a href="work.php?i=<?php echo $a_work['id']; ?>" class="btn btn-info" role="button">查看作品</a>



                    </div>
                    <div class="card-footer bg-dark mb-3">
                        <p class="card-text"><span class="badge badge-pill badge-danger"><?php echo $a_work['category']; ?></span></p>
                      <small class="text-white ">幾分鐘前剛上傳的作品</small>
                    </div>
                  </div>
                </div>

                <?php endforeach; ?>
                <? else: ?>
                <h3 class="text-center">尚無作品</h3>
                <?php endif; ?>

          </div>


        </div>





			</div>
			</div>


    <?php include_once 'footer.php' ;?>




  </body>
</html>
