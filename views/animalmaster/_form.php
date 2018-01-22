<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ZooMaster;
use app\models\AnimalType;
use app\models\AnimalMaster;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model app\models\AnimalMaster */
/* @var $form yii\widgets\ActiveForm */
?>


   
    <div class="panel-body" >
	<div class="col-lg-5 well">
	<div class="row">
				 <?php $form = ActiveForm::begin();
				
				 $query = new Query;
				 if(isset($_SESSION['role']) &&  $_SESSION['role']!='admin'){
				 $query->select(['zoo_name','zoo_master.id'])
				 ->from('zoo_master')
				 ->join('INNER JOIN','user_zoo_map','user_zoo_map.zoo_id=zoo_master.id and user_zoo_map.user_id='.yii::$app->session["id"]);
				 }
				 else{
				 	$query= ZooMaster::find();
				 }
				 
				 
				 $command = $query->createCommand();
				 
				 $data = $command->queryAll(); 
				 ?>		
						<div class="col-sm-12 ">
                              							
								 <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
								
                      			 <?= $form->field($model, 'type_id')->dropDownList(
                      			 		ArrayHelper::map(AnimalType::find()->all(), 'id', 'type'),
                      			 		['prompt'=>'Select Type..']
                      			 )->label('Type') ?>
								     						
                 	
								  <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>
									
                      			
								<?= $form->field($model, 'diet')->textInput(['maxlength' => true]) ?>
							   
 							
 								
 									<?= $form->field($model,'zoo_id')->dropDownList(
 											ArrayHelper::map($data,'id','zoo_name'),
 											['prompt'=>'Select Zoo..']
 											)->label('Zoo Name') ?>	
 									
							
								                     									
						</div>
									<?= $form->field($model,'id')->hiddenInput(['value'=>$model->id])->label(''); ?>	
						  <div class="">
       					 <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    					</div>
                   </div>			
                   <?php ActiveForm::end(); ?>
				</div>
			
		</div>
  