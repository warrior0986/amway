<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use app\models\Persona;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Abono */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="abono-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'fecha')->textInput() ?> -->
    <?= $form->field($model, 'fecha')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ],
        
]);?>
    

    <!-- <?= $form->field($model, 'socio_id')->textInput() ?> -->
    <?php
        echo $form->field($model, 'cliente_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Persona::find()->where(['tipo_cliente'=>'2'])->all(),'id','Nombre_Completo'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione un cliente'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
