<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompraDetalleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-detalle-Buscar">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'compra_id') ?>

    <?= $form->field($model, 'producto_id') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'vr_unitario') ?>

    <?php // echo $form->field($model, 'vr_detalle') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
