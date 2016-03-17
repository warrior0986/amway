<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Compra */

$this->title = 'Crear Compra';
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-Crear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDetalles'=>$modelDetalles,
    ]) ?>

</div>
