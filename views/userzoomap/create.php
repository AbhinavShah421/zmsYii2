<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmpZooMaster */

// $this->title = 'Create Emp Zoo Master';
// $this->params['breadcrumbs'][] = ['label' => 'Emp Zoo Masters', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-zoo-master-create">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) 
    
    ?>

</div>
