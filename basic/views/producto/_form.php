<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\linea;
/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'denominacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'puntos')->textInput() ?>

    <?= $form->field($model, 'vr_neto')->textInput() ?>

    <?= $form->field($model, 'vr_publico')->textInput() ?>

    <?= $form->field($model, 'linea_id')->dropDownList(
        ArrayHelper::map(Linea::find()->all(),'id','descripcion'),
        ['prompt'=>'Seleccione Linea']

    )?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
