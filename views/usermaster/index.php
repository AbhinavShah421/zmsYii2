<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'User Masters';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-master-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//             'id',
        		[
        				'attribute' => 'id',
        				'headerOptions' => ['style' => 'width:10%'],
        		],
//             'fname',
        		[
        				'attribute' => 'fname',
        				'headerOptions' => ['style' => 'width:15%'],
        		],
//             'lname',
        		[
        				'attribute' => 'lname',
        				'headerOptions' => ['style' => 'width:15%'],
        		],
            'email:email',
            'address',
            //'zipcode',
            //'role',
            //'phoneno',
            //'password',
            //'status',
        		
            ['class' => 'yii\grid\ActionColumn',
             'visible' => Yii::$app->session['role']=='admin',
    ],
        ],
    ]); ?>
    
     <p>
        <?= Html::a('Create User Master', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
