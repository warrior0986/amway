<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta_detalle".
 *
 * @property integer $id
 * @property integer $venta_id
 * @property integer $producto_id
 * @property integer $cantidad
 * @property string $vr_unitario
 * @property string $vr_detalle
 * @property double $porc_descuento
 * @property double $vr_descuento
 * @property double $total_detalle
 *
 * @property Venta $venta
 * @property Producto $producto
 */
class VentaDetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venta_detalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto_id', 'cantidad', 'vr_unitario', 'vr_detalle', 'porc_descuento', 'vr_descuento', 'total_detalle'], 'required'],
            [['venta_id', 'producto_id', 'cantidad', 'vr_unitario', 'vr_detalle'], 'integer'],
            [['porc_descuento', 'vr_descuento', 'total_detalle'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'venta_id' => 'Venta ID',
            'producto_id' => 'Producto',
            'cantidad' => 'Cantidad',
            'vr_unitario' => 'Vr Unit',
            'vr_detalle' => 'Vr Detalle',
            'porc_descuento' => '% Desc',
            'vr_descuento' => 'Vr Desc',
            'total_detalle' => 'Total Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenta()
    {
        return $this->hasOne(Venta::className(), ['id' => 'venta_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_id']);
    }
}
