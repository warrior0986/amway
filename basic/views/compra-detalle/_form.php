<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\producto;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\CompraDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-detalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'compra_id')->textInput() ?>

    <!-- <?= $form->field($model, 'producto_id')->textInput() ?> -->
    <?php
        echo $form->field($model, 'producto_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Producto::find()->all(),'id','Nombre'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione un producto'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'vr_unitario')->textInput() ?>

    <?= $form->field($model, 'vr_detalle')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
