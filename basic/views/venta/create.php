<?php

use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title = 'Crear Venta';
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-Crear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDetalles'=>$modelDetalles,
    ]) ?>

</div>
