<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $socio_id
 * @property double $vr_compra
 * @property double $porc_descuento
 * @property double $vr_descuento
 * @property double $total_pagar
 *
 * @property Persona $socio
 * @property CompraDetalle[] $compraDetalles
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'socio_id', 'vr_compra', 'porc_descuento', 'vr_descuento', 'total_pagar'], 'required'],
            [['fecha'], 'safe'],
            [['vr_compra', 'porc_descuento', 'vr_descuento', 'total_pagar', 'puntos'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'socio_id' => 'Socio',
            'vr_compra' => 'Vr Compra',
            'porc_descuento' => '% Desc',
            'vr_descuento' => 'Vr Desc',
            'total_pagar' => 'Total Pagar',
            'puntos' => 'Puntos'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocio()
    {
        return $this->hasOne(Persona::className(), ['id' => 'socio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompraDetalles()
    {
        return $this->hasMany(CompraDetalle::className(), ['compra_id' => 'id']);
    }
}
