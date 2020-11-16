<?php
$file_path = $_SERVER['PHP_SELF'];
$file_name = basename($file_path , ".php");

switch ($file_name) {
	case 'article_list':
	case 'article_edit':
  case 'article_add':
		// code...
		$index = 1;
		break;

		case 'work_list':
		case 'work_edit':
	  case 'work_add':
		$index = 2;
		break;

		case 'member_list':
		case 'member_edit':
	  case 'member_add':
		$index = 3;
		break;

	default:
		$index = 0;
		break;
}
?>

<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-md">
						<div class="jumbotron">
							<h1 class="text-center">後台</h1>

						<!-- bootstrap 3 是Phones (<768px)最多12格  -->
						<!-- bootstrap 4 新增 576px 作為最小的斷點 不用加數字自動分配欄寬 讚 -->
						<!-- navs setting https://getbootstrap.com/docs/4.5/components/navs/ -->

							<!-- class="nav-link active" -->
								<ul class="nav nav-pills nav-fill">
									<li class="nav-item">
										<a 	 href="../">前台首頁</a>
									</li>
									<li class="nav-item">
										<a 	<?php echo ($index == 0)?'class="nav-link active"':'';?> href="./">後台首頁</a>
									</li>
									<li class="nav-item">

										<a <?php echo ($index == 1)?'class="nav-link active"':'';?> href="article_list.php">所有文章</a>
									</li>
									<li class="nav-item">

										<a <?php echo ($index == 2)?'class="nav-link active"':'';?> href="member_list.php">所有作品</a>
									</li>
									<li class="nav-item">

										<a <?php echo ($index == 2)?'class="nav-link active"':'';?> href="member_list.php">所有會員</a>
									</li>

									<li class="nav-item">

										<a  href="../php/logout.php">登出</a>
									</li>


							</ul>
					</div>
				</div>
			</div>
	</div>
</div>
