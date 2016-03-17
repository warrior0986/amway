<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property integer $id
 * @property string $fecha
 * @property double $vr_total
 * @property double $vr_descuento
 * @property double $total_pagar
 * @property integer $cliente_id
 * @property integer $socio_id
 *
 * @property Persona $socio
 * @property Persona $cliente
 * @property VentaDetalle[] $ventaDetalles
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'vr_total', 'vr_descuento', 'total_pagar', 'cliente_id', 'socio_id'], 'required'],
            [['fecha'], 'safe'],
            [['vr_total', 'vr_descuento', 'total_pagar'], 'number'],
            [['socio_id'], 'integer']
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
            'vr_total' => 'Vr Total',
            'vr_descuento' => 'Vr Descuento',
            'total_pagar' => 'Total Pagar',
            'cliente_id' => 'Cliente',
            'socio_id' => 'Socio ID',
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
    public function getCliente()
    {
        return $this->hasOne(Persona::className(), ['id' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaDetalles()
    {
        return $this->hasMany(VentaDetalle::className(), ['venta_id' => 'id']);
    }
}
