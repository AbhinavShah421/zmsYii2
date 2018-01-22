<?php

// use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AnimalMaster */

$this->title = 'Create Animal Master';
// $this->params['breadcrumbs'][] = ['label' => 'Animal Masters', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="animal-master-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
