<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PrestamoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestamo-Buscar">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'socio_origen') ?>

    <?= $form->field($model, 'socio_destino') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'producto_prestado') ?>

    <?php // echo $form->field($model, 'cantidad_prestada') ?>

    <?php // echo $form->field($model, 'vr_prestado') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
