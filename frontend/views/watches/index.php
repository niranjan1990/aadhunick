<?php

use frontend\models\Marketplace;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Watches;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\WatchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Watches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Watches', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' =>'modelno',
                'header' => 'modelno',
                'value' => 'modelno'
            ],
            'brands_id',
            [
                'attribute' =>'marketplace_id',
                'header' => 'market place',
                'value' => function($model) {
                    return $model->marketplace->name;
                }
            ],
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
