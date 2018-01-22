<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnimalMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Animal Masters';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="animal-master-index">

    <?php   // echo $this->render('_search', ['model' => $searchModel]); ?>

 
  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//             'id',
            'name',
//             'type_id',
        	'type',
            'age',
            'diet',
//             'zoo_id',
        	'zoo_name',

            ['class' => 'yii\grid\ActionColumn',
            		'headerOptions' => ['style' => 'width:10%'],
             
    ],
        ],
    ]); ?>
       <p>
        <?= Html::a('Create Animal Master', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
