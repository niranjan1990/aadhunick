<?php
/**
 * Created by PhpStorm.
 * User: napster
 * Date: 10/11/2015
 * Time: 4:25 PM
 */
use frontend\models\Watches;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>
    <td><?php $i = $count + 1;
        echo $i; ?>
    </td>
    <td>
        <?=

         Select2::widget([
            'model' => $model,
            'attribute' => 'watches_id['.$count.']',
            'data' => Arrayhelper::map(Watches::find()->all(), 'id', 'modelno'),
            'options' => [
                'placeholder' => '',
                'onchange' => '
                                            $.post("/index.php/bills/bcontent?id='.'"+$(this).val(),function(data){

                                                    $("#bills-description-'.$count.'").val(data["brand"]);
                                                    $("#bills-price-'.$count.'").val(data["price"]);
                                            },"json");
                                            '
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

        ?>
    </td>
    <td>
        <div class="form-group field-bills-description-<?= $count ?>">
            <input type="text" id="bills-description-<?= $count ?>" class="form-control" name="Bills[description][<?= $count ?>]">
        </div>
    </td>
    <td>
        <div class="form-group field-bills-quantity-<?= $count ?> required ">
        <?= \yii\helpers\Html::activeTextInput(
          $model,
            'quantity['.$count.']',
            ['class' => 'form-control bills-quantity']
            ); ?>
        </div>
    </td>
    <td>
        <div class="form-group field-bills-price-<?= $count ?> required ">
            <input type="text" id="bills-price-<?= $count ?>" class="form-control bills-price"
                   name="Bills[price][<?= $count ?>]">
        </div>
    </td>