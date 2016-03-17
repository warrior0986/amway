<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompraDetalleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compra Detalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-detalle-Inicio">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Compra Detalle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'compra_id',
            'producto_id',
            'cantidad',
            'vr_unitario',
            // 'vr_detalle',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
