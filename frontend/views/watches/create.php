<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Watches */

$this->title = 'Create Watches';
$this->params['breadcrumbs'][] = ['label' => 'Watches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watches-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
