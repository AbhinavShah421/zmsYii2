<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-master-form">


       <div class="panel-body" >
	<div class="col-lg-12 well">
	<div class="row">
				    <?php $form = ActiveForm::begin(); ?>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 ">
								
								  <?= $form->field($model, 'fname')->textInput(['maxlength' => true])->label('First Name') ?>

							</div>
							<div class="col-sm-6 ">
								
							  <?= $form->field($model, 'lname')->textInput(['maxlength' => true])->label('Last Name')?>
							</div>
						</div>					
						<div class=" textarea">
								  <?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?>
							
						</div>
                        <div class="col-sm-4 ">
								  <?= $form->field($model, 'phone_no')->textInput(['maxlength' => true]) ?>
								 
							</div>			
						<div class="row">
							<div class="col-sm-4 ">
								
								<?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>
							</div>	
							<div class="col-sm-4 ">
								
								 <?=
								 $form->field($model, 'role')->dropDownList(array("manager"=>"Manager","admin"=>"Admin"),array('empty'=>'Select Value'));
								 ?>
							</div>
							
							
						</div>
						<div class="row">
							<div class="col-sm-4 ">
								 <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
								 
							</div>		
							<div class="col-sm-4 ">
								
								 <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
							</div>	
							<div class="col-sm-2">
							<?= 
							$form->field($model,'status')->dropDownList(array("1"=>"Active","0"=>"InActive"),array('empty'=>'Select Value'));
							?>
							</div>
							  <?= $form->field($model, 'id')->hiddenInput(['value'=>$model->id])->label('')?>
						</div>	
						      
						 <?php ActiveForm::end(); ?>					
					
					    <div class="">
					        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					    </div>

										
					</div>
				
               
				</div>
			</div>
</div>
   

</div>
