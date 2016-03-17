<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Prestamo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestamo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'socio_origen')->textInput() ?>

    <?= $form->field($model, 'socio_destino')->textInput() ?>

    <!-- <?= $form->field($model, 'fecha')->textInput() ?> -->
    <?= $form->field($model, 'fecha')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ],
        'language'=>'es',
]);?>

    <?= $form->field($model, 'producto_prestado')->textInput() ?>

    <?= $form->field($model, 'cantidad_prestada')->textInput() ?>

    <?= $form->field($model, 'vr_prestado')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'PENDIENTE' => 'PENDIENTE', 'COMPLETADO' => 'COMPLETADO', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
