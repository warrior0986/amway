<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CompraDetalle */

$this->title = 'Crear Compra Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Compra Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-detalle-Crear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
