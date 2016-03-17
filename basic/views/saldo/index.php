<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SaldoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Saldos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saldo-Inicio">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Saldo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'socio_id',
            'cliente_id',
            'debe',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
