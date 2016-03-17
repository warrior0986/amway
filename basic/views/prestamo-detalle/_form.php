<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PrestamoDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestamo-detalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prestamo_id')->textInput() ?>

    <?= $form->field($model, 'producto_pago')->textInput() ?>

    <?= $form->field($model, 'cantidad_pago')->textInput() ?>

    <?= $form->field($model, 'vr_pagado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
