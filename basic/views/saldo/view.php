<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Saldo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Saldos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saldo-Ver">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'socio_id',
            'cliente_id',
            'debe',
        ],
    ]) ?>

</div>
