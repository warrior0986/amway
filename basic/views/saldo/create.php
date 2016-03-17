<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Saldo */

$this->title = 'Crear Saldo';
$this->params['breadcrumbs'][] = ['label' => 'Saldos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saldo-Crear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
