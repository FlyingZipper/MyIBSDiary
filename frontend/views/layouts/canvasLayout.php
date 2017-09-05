<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\assets\canvasAsset;
use common\widgets\Alert;

canvasAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
	<title><?= "My IBS Diary - ".Html::encode($this->title) ?></title>
	<link rel="shortcut icon" href="/image/my-isb-diary-logo.png" type="image/png" />
	
    <?php $this->head() ?>
</head>
    
<body class="stretched side-push-panel device-xxs" data-loader="10" data-animation-in="fadeIn" data-speed-in="1500" data-animation-out="fadeOut" data-speed-out="800">

<?php $this->beginBody() ?>
<!--TODO : ajuster les icons -->

	<!-- The Main Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header page-section">

			<div id="header-wrap" class="">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
                    ============================================= -->
					<!--TODO Ajouter un logo-->
					<div id="logo">
						<a href="index.php" class="standard-logo" data-dark-logo="/image/my-isb-diary-logo.png"><img src="/image/my-isb-diary-logo.png" alt="Canvas Logo"></a>
						<a href="index.php" class="retina-logo" data-dark-logo="/image/my-isb-diary-logo.png"><img src="/image/my-isb-diary-logo.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation 
                    ============================================= -->
                    <!--TODO DETERMINER LE CURRENT EN PHP-->
					<nav id="primary-menu"> 

						<ul class="one-page-menu sf-js-enabled" style="touch-action: pan-y;">
                            <li><a href="/index.php?r=site%2Findex" data-href="<?=Yii::$app->controller->current_page['acceuil']?>"><div>Home</div></a></li>
							<li><a href="/index.php?r=site%2Frecettes" data-href="<?=Yii::$app->controller->current_page['recettes']?>"><div>Recipes</div></a></li>
							<li><a href="/index.php?r=site%2Fabout" data-href="<?=Yii::$app->controller->current_page['a_propos']?>"><div>About</div></a></li>
							<li><a href="index.php?r=site%2Fcontact" data-href="<?=Yii::$app->controller->current_page['contacter_nous']?>"><div>Contact us</div></a></li>
							
							<?php 

						 	
							 
							if (Yii::$app->user->isGuest) 
							{

								echo '<li><a href="/index.php?r=site%2Flogin" data-href="'.Yii::$app->controller->current_page['connection'].'"><div>Connection</div></a></li>';
								echo '<li><a href="/index.php?r=site%2Fsignup" data-href="'.Yii::$app->controller->current_page['inscription'].'"><div>Inscription</div></a></li>';

							}
							else{
								if(Yii::$app->user->identity->super_user)
								{
									echo '<li><a href="index.php?r=site%2Faddrecipe" data-href="'.Yii::$app->controller->current_page['add_recepie'].'"><div>Add Recepie</div></a></li>';
								}
								echo '<li><a id="logout" href="javascript:{}" onclick="logout()">Sign Out<div style="display:none">'
									. Html::beginForm(['/site/logout'], 'post' , ['name' => 'logout'])
									. Html::endForm()
									. '</div></a></li>';
							}
							?>

<!--
	<form action="/index.php?r=site%2Flogout" method="post">
<input type="hidden" name="_csrf-frontend" value="a-QKz5n8_PnM4eT0uHPN7_NoAk9kJWnCI2T5Ta-6BqyFKQPpO5rzhmxAzY6He7-DlI9yhth9c8g4MHDrj1Q_1Q=="><button type="submit" class="btn btn-link logout">Logout (fghjkl)</button></form>
-->
						</ul>

                    <!-- Top Search TODO REGLER LE ICON
						============================================= -->
                    <div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<!-- Use an active form -->

							<?= Html::beginForm(['/site/search'], 'get' , ['name' => 'topSearch']) ?>
								<!--type, input name, input value, options-->
								<?= Html::input('text', 'search', '', ['class' => 'form-control', 'placeholder'=>'Find a Recipe' ]) ?>
							<?= Html::endForm() ?>

							<!--
							<form action="/index.php?r=site%2Faddrecipe" method="get">
								<input type="text"  class="form-control" value="" placeholder="Find a Recipe">
							</form>
							-->
						</div><!-- top-search end -->

                    </nav><!-- #primary-menu end -->
                    

				</div>

			</div>

		</header>

		<!-- Site Content
		============================================= -->
		<section id="content">

		<?= $content ?>

		</section>

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<!-- Copyrights
			============================================= -->

			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights © <?= date('Y') ?> All Rights Reserved by My IBS Diary
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="https://www.instagram.com/myibsdiary/?hl=en" target="_blank" class="social-icon si-small si-borderless si-instagram">
								<i class="icon-instagram"></i>
								<i class="icon-instagram"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

						</div>

						<div class="clear"></div>
					</div>

				</div>

			</div>

		</footer>

	</div>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
