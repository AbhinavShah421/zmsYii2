<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ZooMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zoo-master-form">

    

    

    

   

    
    
    
    <div class="panel-body" >
	<div class="col-lg-5 well">
	               <div class="row">
	                 	<?php $form = ActiveForm::begin(); ?>			
							<div class="row" form-group">
                            <div class="col-sm-12">	
                            <?= $form->field($model, 'id')->hiddenInput()->label(" "); ?>		
							<?= $form->field($model, 'zoo_name')->textInput(['maxlength' => true]) ?>
									
							<?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?>
							</div>
                            </div>
                         	
						  <div class="form-group">
					        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					    </div>			
			      <?php ActiveForm::end(); ?>	                    
					</div>		
				</div>
                      
			</div>
		</div>
    </div>

</div>
