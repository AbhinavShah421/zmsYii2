<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserMaster */

$this->title = $model->fname." ".$model->lname;
// $this->params['breadcrumbs'][] = ['label' => 'User Masters', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-master-view">

    <h1><?= Html::encode($this->title) ?></h1>
  
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//             'id',
            'fname',
            'lname',
            'email:email',
            'address',
            'zip_code',
            'role',
            'phone_no',
            'password',
//             'status',
        ],
    ]) ?>
      <?php if($_SESSION['role']=='admin'){?>
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
   <?php }?>
</div>
