<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InventarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventario-Buscar">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'socio_id') ?>

    <?= $form->field($model, 'producto_id') ?>

    <?= $form->field($model, 'cantidad_fisico') ?>

    <?= $form->field($model, 'cantidad_prestamo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
