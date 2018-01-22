<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AnimalMaster */

$this->title = $model->name;
// $this->params['breadcrumbs'][] = ['label' => 'Animal Masters', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="animal-master-view">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//             'id',
            'name',
//             'type_id',
            'type',
        	'age',
            'diet',
            'zoo_name',
        ],
    ]) ?>
          <p>
	        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
	            'class' => 'btn btn-danger',
	            'data' => [
	                'confirm' => 'Are you sure you want to delete this item?',
	                'method' => 'post',
	            ],
	        ]) ?>
  		  </p>
</div>
