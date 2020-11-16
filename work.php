<?php

require_once 'php/db.php';

require_once 'php/functions.php';


$work = get_work($_GET['i']);
$site_title = strip_tags($work['intro']);
$site_title = mb_substr($site_title, 0, 12, "UTF-8") . "...";


?>

<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
  <head>
    <head>
    <title><?php echo $site_title; ?></title>
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
			<div class="container-fluid">
			  <div class="card">



                    <div class="card-header text-center"><h2><?php echo $work['intro']; ?></h2></div>
                    <div class="card-body">
                        <h4 class="badge badge-secondary">上傳日期：<?php echo $work['upload_date']; ?></h4>

                        <div class="card-text">

                          <div class="card-group">
                          <?php if($work['image_path']):?>
                            <img src="<?php echo $work['image_path'];?>" alt="moon" class="img-fluid">

                          <?php else:?>
                            <div class="embed-responsive embed-responsive-16by9">
                            <video src="<?php echo $work['video_path'];?>" controls></video>
                            </div>
                            <?php endif;?>
                          </div>

                            <hr>
                          <div class="container">
                              <div  clearfix">
                              <button class="btn btn-outline-danger btn-lg float-left">點我沒有反應</button>
                              <button class="btn btn-outline-secondary btn-lg float-right">不要點我，裝飾用</button>
                              </div>
                          </div>
                        </div>


                    </div>
                    <div class="card-footer">

                        <span class="badge badge-pill badge-dark">標籤：<?php echo $work['category']; ?></span>

                    </div>




			  </div>
			</div>
			</div>


<?php include_once 'footer.php' ;?>




  </body>
</html>
