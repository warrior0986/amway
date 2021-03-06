<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VentaDetalle */

$this->title = 'Update Venta Detalle: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Venta Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="venta-detalle-Actualizar">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
