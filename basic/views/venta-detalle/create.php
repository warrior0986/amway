<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VentaDetalle */

$this->title = 'Crear Venta Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Venta Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-detalle-Crear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
