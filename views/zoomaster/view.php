<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ZooMaster */

$this->title = $model->zoo_name;
// $this->params['breadcrumbs'][] = ['label' => 'Zoo Masters', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="zoo-master-view">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//             'id',
            'zoo_name',
            'address',
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
