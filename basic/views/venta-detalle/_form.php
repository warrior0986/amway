<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VentaDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-detalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'venta_id')->textInput() ?>

    <!-- <?= $form->field($model, 'producto_id')->textInput() ?> -->
    <!-- <?= $form->field($model, 'producto_id')->dropDownList(
        ArrayHelper::map(Persona::find()->all(),'id','Nombre'),
        ['prompt'=>'Seleccione Producto']

    )?> -->
    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'vr_unitario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vr_detalle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'porc_descuento')->textInput() ?>

    <?= $form->field($model, 'vr_descuento')->textInput() ?>

    <?= $form->field($model, 'total_detalle')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
