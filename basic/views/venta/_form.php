<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Persona;
use dosamigos\datepicker\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\select2\Select2;
use app\models\Producto;
use yii\helpers\Url;
?>
<div class="venta-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>

    <!-- <?= $form->field($model, 'fecha')->textInput() ?> -->
    <?php 
// with an ActiveForm instance 
?>
<div class="row container">
<div class="col-md-3 col-xs-6">
    <?= $form->field($model, 'cliente_id')->dropDownList(
            ArrayHelper::map(Persona::find()->where(['tipo_cliente'=>'2'])->all(),'id','Nombre_Completo'),
            ['prompt'=>'Seleccione Cliente']

    )?>
</div>
<div class="col-md-3 col-xs-6">
    <?= $form->field($model, 'fecha')->widget(
        DatePicker::className(), [
            // inline too, not bad
             'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                //'startDate'=>'-3d',                
            ],
            'language'=>'es',
    ]);?>
</div>
<div class="col-md-2 col-xs-6">
    <?= $form->field($model, 'vr_total')->textInput(['readOnly'=>true]) ?>
</div>
<div class="col-md-2 col-xs-6">
    <?= $form->field($model, 'vr_descuento')->textInput(['readOnly'=>true]) ?>
</div>
<div class="col-md-2 col-xs-6">
    <?= $form->field($model, 'total_pagar')->textInput(['readOnly'=>true]) ?>
</div>
    <!-- <?= $form->field($model, 'cliente_id')->textInput() ?> -->
    
    <!-- <?= $form->field($model, 'socio_id')->textInput() ?> -->
</div>


    <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-usd"></i> Venta Detalle</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 100, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelDetalles[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    //'venta_id',
                    'producto_id',
                    'cantidad',
                    'vr_unitario',
                    'vr_detalle',
                    'porc_descuento',
                    'vr_descuento',
                    'total_detallte'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelDetalles as $i => $modelDetalleUno): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Producto</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelDetalleUno->isNewRecord) {
                                echo Html::activeHiddenInput($modelDetalleUno, "[{$i}]id");
                            }
                        ?>
                        
                        <div class="row">

                            <div class="col-sm-3 col-xs-4">
                                <?php
                                    echo $form->field($modelDetalleUno, "[{$i}]producto_id")->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(Producto::find()->all(),'id','nombre'),
                                    'language' => 'es',
                                    'class'=>'input_productoid',
                                    'options' => ['placeholder' => 'Seleccione un producto',
                                                   'class'=>'ddlventaDetalle'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]);?>
                            </div>
                            <div class="col-sm-1 col-xs-4">
                                <?= $form->field($modelDetalleUno, "[{$i}]cantidad")->textInput(['class'=>'form-control cantidad_input']) ?>
                            </div>
                        
                            <div class="col-sm-2 col-xs-4">
                                <?= $form->field($modelDetalleUno, "[{$i}]vr_unitario")->textInput() ?>
                            </div>
                            <div class="col-sm-2 col-xs-4">
                                <?= $form->field($modelDetalleUno, "[{$i}]vr_detalle")->textInput(['class'=>'form-control vr_detalle_input', 'readOnly'=>true]) ?>
                            </div>
                            <div class="col-sm-1 col-xs-4">
                                <?= $form->field($modelDetalleUno, "[{$i}]porc_descuento")->textInput(['class'=>'form-control porc_descuento_input']) ?>
                            </div>
                            <div class="col-sm-1 col-xs-4">
                                <?= $form->field($modelDetalleUno, "[{$i}]vr_descuento")->textInput(['class'=>'form-control vr_descuento_input', 'readOnly'=>true]) ?>
                            </div>
                            <div class="col-sm-2 col-xs-4">
                                <?= $form->field($modelDetalleUno, "[{$i}]total_detalle")->textInput(['class'=>'form-control vr_total_input', 'readOnly'=>true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
