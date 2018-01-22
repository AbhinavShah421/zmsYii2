<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ZooMaster;
use app\models\UserMaster;
/* @var $this yii\web\View */
/* @var $model app\models\EmpZooMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emp-zoo-master-form">
       						<div class="panel-body" >
							<div class="col-lg-5 well">
							<div class="row">
							    <?php $form = ActiveForm::begin(); ?>
							    <div class="row" >
                            <div class="col-sm-8">
							  <?= $form->field($model, 'zoo_id')->dropDownList(
                      			 		ArrayHelper::map(ZooMaster::find()->all(), 'id', 'zoo_name'),
                      			 		['prompt'=>'Select Zoo..']
                      			 )->label('Zoo Name') ?>
  							</div>
                             <div class="col-sm-8">
   							  <?= $form->field($model, 'user_id')->dropDownList(
                            		ArrayHelper::map($users	=	UserMaster::find()->all(),'id', function ($users, $defaultValue) {
                            			return $users['fname'] . ' ' . $users['lname'];
                            	}),
                      			 		['prompt'=>'Select Manager..']
                      			 )->label('Manager Name') ?>
                      		</div>
                            </div>	 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</div>
</div>
</div>
    <?php ActiveForm::end(); ?>

</div>
   