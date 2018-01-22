<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ZooMaster */

// $this->title = 'Update Zoo Master: {nameAttribute}';
// $this->params['breadcrumbs'][] = ['label' => 'Zoo Masters', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="zoo-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
