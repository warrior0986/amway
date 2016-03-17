<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-Inicio">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Crear Persona', ['value'=>Url::to('create'),'class' => 'btn btn-success', 'id'=>'modal_crearPersonaB']) ?>
    </p>
    <?php
        Modal::begin([
            'header'=>'<h4>Crear Persona</h4>',
            'id'=>'modal_persona',
            'size'=>'modal-md',
            'toggleButton'=>[
                'tag'=>'a',
            ],
            ]);
            echo "<div id='modal_crearPersona'></div>"   ;
        Modal::end();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cedula',
            'nombres',
            'apellidos',
            'telefono',
            // 'celular',
            // 'email:email',
            // 'tipo_cliente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
