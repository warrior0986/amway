<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AbonoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abonos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abono-Inicio">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Registrar Abono', ['value'=>Url::to('abono/create'),'class' => 'btn btn-success', 'id'=>'modal_crearAbonoB']) ?>
    </p>
    <?php
        Modal::begin([
            'header'=>'<h4>Registrar Abono</h4>',
            'id'=>'modal_abono',
            'size'=>'modal-md',
            
            ]);
            echo "<div id='modal_crearAbonoB'></div>"   ;
        Modal::end();
    ?>
    <?php
        Modal::begin([
            'header'=>'<h4>Actualizar Abono</h4>',
            'id'=>'modal_abono_update',
            'size'=>'modal-md',
            
            ]);
            echo "<div id='modal_actualizarAbonoB'></div>"   ;
        Modal::end();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha',
            //'socio_id',
            [
                'attribute'=>'cliente_id',
                'value'=>'cliente.Nombre_Completo',
            ],
            [
                'value'=>'valor',
                'format'=>'currency',
            ],

            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'controller'=>'abono',
                'buttons'=>[
                    'update'=> function($url, $model, $key){
                        
                        return Html::button('',['id'=>'modalupdateabono','class'=>'glyphicon glyphicon-pencil updatebutton UpdAbono','data-toggle'=>'tooltip', 'title'=>'Actualizar','value'=>'update/'.$key]);
                    }
                ]

            ],
        ],
    ]); ?>

</div>
