<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Abono */

$this->title = 'Crear Abono';
$this->params['breadcrumbs'][] = ['label' => 'Abonos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abono-Crear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
