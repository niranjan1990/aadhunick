<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Watches;
use frontend\models\Brands;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inventorystock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventorystock-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model,'brand_id')->dropDownList(
        ArrayHelper::map(Brands::find()->all(),'id','name'),
        [
            'prompt'=>'select brand',
            'onchange'=>'
                        $.post("/index.php/watches/lists?id='.'"+$(this).val(),function(data){
                                    $("select#inventorystock-watches_id").html(data);
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


    <?= $form->field($model,'watches_id')->dropDownList(
        ArrayHelper::map(Watches::find()->all(),'id','modelno'),
        ['prompt'=>'select model no']
        )
    ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
