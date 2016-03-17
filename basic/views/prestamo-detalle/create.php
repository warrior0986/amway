<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PrestamoDetalle */

$this->title = 'Crear Prestamo Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Prestamo Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamo-detalle-Crear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
