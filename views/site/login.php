<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;
AppAsset::register($this);
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<input type="hidden" id="login-url" value="<?= Yii::$app->urlManager->createUrl("site/loginsubmit")?>"/>

<div class=" col-sm-offset-4 col-sm-4">
<div class="site-login card col-sm-offset-1 col-sm-10">
 
     <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />  

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',    	
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{input}\n<div class=\"col-lg-11\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Email address'])->label(''); ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password'])->label(''); ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "{input} {label}\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

       

    <?php ActiveForm::end(); ?>
     <div class="form-group">
            <div class="col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-primary btn-block btn-signin', 'name' => 'login-button','id'=>'loginSubmit']) ?>
            </div>
        </div>
    
    <div class="col-lg-offset-1" style="color:#999;">
    <a href="#" class="forgot-password">
                Forgot the password?
            </a>
<!--         You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br> -->
<!--         To modify the username/password, please check out the code <code>app\models\User::$users</code>. -->
<!--     </div> -->
</div>
</div>
</div>