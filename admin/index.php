<?php 

require_once '../php/db.php';


if(!isset($_SESSION['is_login']) || !$_SESSION['is_login'])
{
  ob_start();
	header("Location: login.php");
  ob_end_flush();
}



 ?>

<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
  <head>
    <head>
    <title>後台</title>
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
        <div class="col-md">
          <div class="main">
            <div class="alert alert-info" role="alert">神秘後台</div>

            <img src="../image/index.jpg" class="img-fluid" alt="Responsive image">



          </div>

        </div>
      </div>
    </div>
  </div>

<?php include_once 'footer.php' ;?>




  </body>
</html>
