<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-Inicio">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'cliente_id',
                'value'=>'cliente.Nombre_Completo',
            ],
            'fecha',
            [
                'label'=>'Vr Detalle',
                'value'=>'vr_total',
                'format'=>'currency',
            ],
            [
                'label'=>'Vr Desc',
                'value'=>'vr_descuento',
                'format'=>'currency',
            ],
            [
                'label'=>'Total',
                'value'=>'total_pagar',
                'format'=>'currency',
            ],

            // 'socio_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
