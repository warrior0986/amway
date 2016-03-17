<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VentaDetalleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-detalle-Buscar">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'venta_id') ?>

    <?= $form->field($model, 'producto_id') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'vr_unitario') ?>

    <?php // echo $form->field($model, 'vr_detalle') ?>

    <?php // echo $form->field($model, 'porc_descuento') ?>

    <?php // echo $form->field($model, 'vr_descuento') ?>

    <?php // echo $form->field($model, 'total_detalle') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
