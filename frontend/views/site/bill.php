<?php
/**
 * Created by PhpStorm.
 * User: napster
 * Date: 8/27/2015
 * Time: 12:48 PM
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Bills;

?>
<div class="container">
    <div class="row">
        <img src="/img/bill-header.png" class="img-responsive col-md-12">
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <img src="/img/titan.jpg" class="img-responsive" alt="Responsive image">
            </div>
            <div class="row" style="display: inline;
    padding-right: 20px;">
                <img src="/img/fastrack.jpg" class="img-responsive" alt="Responsive image">
            </div>
            <div class="row" style="display: inline;
    padding-right: 20px;">
                <img src="/img/sonata.gif" class="img-responsive" alt="Responsive image">
            </div>
            <div class="row" style="display: inline;
    padding-right: 20px;">
                <img src="/img/timex.jpg" class="img-responsive" alt="Responsive image">
            </div>
        </div>
        <div class="col-md-8">
            <div class="bills-entry">
                <?php $form = ActiveForm::begin(['method' => 'POST']); ?>
                <?= $form->field($model, 'billrecord')->textInput() ?>
                <?= $form->field($model, 'pament_mode[0]')->textInput() ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="bill">
                        <thead>
                        <tr>
                            <th>Slno</th>
                            <th>Particulars</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th><?php $i=0; echo $i;?></th>
                            <th><?= $form->field($model, 'watches_id[0]')->textInput() ?></th>
                            <th><?= $form->field($model, 'quantity[0]')->textInput() ?></th>
                            <th><div class="form-group field-bills-price-0 required ">
                                    <label class="control-label" for="bills-price-0">Price</label>
                                    <input type="text" id="bills-price-0" class="form-control" name="Bills[price][0]">
                                </div></th>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <?= Html::button('+',['class'=>'btn btn-danger','id'=>'add','value'=>'1'])?>
                    <button id="add" class="1" type="button">+</button>
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <img src="/img/casio.png" class="img-responsive" alt="Responsive image">
            </div>
            <div class="row" style="display: inline;
    padding-right: 20px;">
                <img src="/img/fossil.jpg" class="img-responsive" alt="Responsive image">
            </div>
            <div class="row" style="display: inline;
    padding-right: 20px;">
                <img src="/img/tommy.jpg" class="img-responsive" alt="Responsive image">
            </div>
            <div class="row" style="display: inline;
    padding-right: 20px;">
                <img src="/img/Q&Q.gif" class="img-responsive" alt="Responsive image">
            </div>
        </div>
    </div>
    <div class="row">
        <img src="/img/bill-footer.png" class="img-responsive col-md-12" alt="Responsive image">
    </div>
</div>

<?php $this->registerJs("
        $(document).ready(function() {

    });

");


