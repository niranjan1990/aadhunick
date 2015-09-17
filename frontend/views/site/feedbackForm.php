<?php
/**
 * Created by PhpStorm.
 * User: napster
 * Date: 8/22/2015
 * Time: 2:33 AM
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php
if(Yii::$app->session->hasFlash('success')){
    echo Yii::$app->session->getFlash('success');
}
?>
<?php $form= ActiveForm::begin(); ?>
<?= $form->field($model,'name'); ?>
<?= $form->field($model,'email'); ?>
<?= Html::submitButton('Submit',['class'=>'btn btn-success']); ?>
<?php $form=ActiveForm::end(); ?>