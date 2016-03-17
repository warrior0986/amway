<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoCliente */

$this->title = 'Crear Tipo Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-cliente-Crear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
