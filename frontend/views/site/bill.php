<?php
/**
 * Created by PhpStorm.
 * User: napster
 * Date: 8/27/2015
 * Time: 12:48 PM
 */

use frontend\models\Brands;
use frontend\models\Watches;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="bills-entry">
                <?php $form = ActiveForm::begin(['method' => 'POST']); ?>
                <?= $form->field($model, 'billrecord')->textInput() ?>
                <?= $form->field($model, 'pament_mode')->textInput() ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="bill">
                        <thead>
                        <tr>
                            <th>Slno</th>
                            <th>Particulars</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?= $this->render('_watch-add', ['model' => $model, 'count' => $count]); ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="Taxes">
                        <thead>
                        <tr>
                            <th colspan="5">Charges</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th colspan="4">
                                <div class="form-group field-bills-net required">
                                    <label class="control-label" for="bill-net">Net</label>
                                </div>
                            </th>
                            <th>
                                <div class="form-group field-bills-net required">
                                    <label class="control-label" for="bill-net">Net Value</label>
                                    <input type="text" id="bills-net" class="form-control" name="net" readonly>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <div class="form-group field-bills-discount required ">
                                    <label class="control-label" for="bills-discount">Discount</label>
                                    <input type="text" id="bills-discount" class="form-control" name="Discount">
                                </div>
                            </th>
                            <th>
                                <div class="form-group field-bills-discountValue required">
                                    <label class="control-label" for="bills-discountValue">Discount Value</label>
                                    <input type="text" id="bills-discountValue" class="form-control"
                                           name="Discount Value" readonly >
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <div class="form-group field-bills-vat required ">
                                    <label class="control-label" for="bills-vat">VAT</label>
                                    <input type="text" id="bills-vat" class="form-control" name="VAT" value="14.5%" readonly>
                                </div>
                            </th>
                            <th>
                                <div class="form-group field-bills-vatValue required">
                                    <label class="control-label" for="bills-vatValue">VAT Value</label>
                                    <input type="text" id="bills-vatValue" class="form-control" name="VAT Value" readonly>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <div class="form-group field-bills-total required ">
                                    <label class="control-label" for="bills-total">Total</label>
                                 <!--   <input type="text" id="bills-total" class="form-control" name="Total">-->
                                </div>
                            </th>
                            <th>
                                <div class="form-group field-bills-totalValue required">
                                    <label class="control-label" for="bills-totalValue">Total Value</label>
                                    <input type="text" id="bills-totalValue" class="form-control"
                                           name="Total Value">
                                </div>
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <?= Html::button('+', ['class' => 'btn btn-danger', 'id' => 'add', 'value' => '1']) ?>
                    <button id="add" class="1" type="button">+</button>
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <?php echo Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Generate Bill', ['/site/report'], [
            'class' => 'btn btn-danger',
            'target' => '_blank',
            'data-toggle' => 'tooltip',
            'title' => 'Will open the generated PDF file in a new window'
        ]);
        ?>
    </div>
</div>






<?php $this->registerJs('    $(document).ready(function() {
                                      /* $("#add").on("click",function(){
                                            $("#trick").show();
                                        });*/
                                 });'
);


