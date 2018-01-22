<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

       <div class="container main-dash">
        <div class="row panel panel-body head-row" >
            <!-- dash -->	   	       
		    <div class="col-sm-3 head-nav1"><center>ZooMS</center></div>      
		     <!--      right-dash -->
	         <div class="col-sm-3 head-nav">
		       <center> DASHBOARD : <?= strtoupper(Yii::$app->session['role'])?></center>
		     </div>
		     <div class="col-sm-6 head-nav">
		         WELCOME : <?=	        
		       
      		       strtoupper( Yii::$app->session['user']);
		        
		        ?>
		        <div class="dropdown user-icon">
				<span class="glyphicon glyphicon-user dropdown-toggle" id="user" data-toggle="dropdown"></span>
				<ul class="dropdown-menu">
				<li class="logout"><a href="/zmsYii2/site/userlogout" class="logout"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
				</ul>
<!-- 			         <span class="glyphicon glyphicon-cog user-icon"></span> -->
<!-- 			         <span class="glyphicon glyphicon-envelope user-icon" ></span>		       -->
           		</div>
             </div>
         </div>
          <div class="row main-row">
		  <!--    left-nav-div -->
          <div class="col-sm-3 panel panel-body head left-nav-div ">           
			<?php echo $this->render('//site/navigation');  ?>
         

<!--     ..............................      -->
          </div>
           <div class="col-sm-9 panel panel-body head main-body" id="main_contant">
                  <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
               ]) ?>
              <?= Alert::widget() ?>
              <?= $content ?>
           </div>
          </div>         
         </div> 


<!-- .......................................-->
<!-- <div class="wrap"> -->
    <?php
//     NavBar::begin([
//         'brandLabel' => Yii::$app->name,
//         'brandUrl' => Yii::$app->homeUrl,
//         'options' => [
//             'class' => 'navbar-inverse navbar-fixed-top',
//         ],
//     ]);
//     echo Nav::widget([
//         'options' => ['class' => 'navbar-nav navbar-right'],
//         'items' => [
//             ['label' => 'Home', 'url' => ['/site/index']],
//             ['label' => 'About', 'url' => ['/site/about']],
//             ['label' => 'Contact', 'url' => ['/site/contact']],
//             Yii::$app->user->isGuest ? (
//                 ['label' => 'Login', 'url' => ['/site/login']]
//             ) : (
//                 '<li>'
//                 . Html::beginForm(['/site/logout'], 'post')
//                 . Html::submitButton(
//                     'Logout (' . Yii::$app->user->identity->username . ')',
//                     ['class' => 'btn btn-link logout']
//                 )
//                 . Html::endForm()
//                 . '</li>'
//             )
//         ],
//     ]);
//     NavBar::end();
    ?>

<!--     <div class="container"> -->
      
<!--     </div> -->
<!-- </div> -->
<?php /*
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
*/
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
