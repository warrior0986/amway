<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-Inicio">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            
            // [
            //     'attribute'=>'socio_id',
            //     'value'=>'socio.Nombre_Completo',
            // ],
            'fecha',            
            [
                'label'=>'Vr Detalle',
                'value'=>'vr_compra',
                'format'=>'currency',
            ],
            //'porc_descuento',
            [
                'label'=>'Vr Descuento',
                'value'=>'vr_descuento',
                'format'=>'currency',
            ],
            [
                'label'=>'Total',
                'value'=>'total_pagar',
                'format'=>'currency',
            ],
            'puntos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
