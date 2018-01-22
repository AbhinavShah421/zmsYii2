<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZooMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Zoo Masters';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="zoo-master-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'zoo_name',
            'address',

            ['class' => 'yii\grid\ActionColumn',
            'visible' => Yii::$app->session['role']=='admin',
    ],
        ],
    ]); ?>
     <p>
        <?= Html::a('Add New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
