<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Inventorystock */

$this->title = 'Create Inventorystock';
$this->params['breadcrumbs'][] = ['label' => 'Inventorystocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventorystock-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
