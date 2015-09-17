<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Brands;
use frontend\models\Marketplace;
use frontend\models\watches;

/* @var $this yii\web\View */
/* @var $model frontend\models\Watches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="watches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'brands_id')->dropDownList(
        ArrayHelper::map(Brands::find()->all(),'id','name'),
        [
            'prompt'=>'select brand',
            'onchange'=>'
                        $.post("/index.php/watches/lists?id='.'"+$(this).val(),function(data){
                                    $("select#watches-modelno").html(data);
                        });
              '
//                        $.get(
//                            "' . Url::toRoute('watches/lists') . '",
//                             { id: $(this).val(); }
//                            );

            /*$.post("/index.php/watches/lists&$id='.'"+$(this).val(),function(data){
                $("select#models-contact").html(data);
            });*/


        ]);
    ?>

    <?= /*$form->field($model, 'modelno')->dropDownList(
        ArrayHelper::map(watches::find()->all(),'id','modelno'),
        ['prompt'=>'select model no']
        )*/
        $form->field($model,'modelno')->textInput()
    ?>

    <?= $form->field($model, 'marketplace_id')->dropDownList(
        ArrayHelper::map(marketplace::find()->all(),'id','name'),
        ['prompt'=>'select marketplace']
        )
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
