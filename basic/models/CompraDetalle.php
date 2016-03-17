<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra_detalle".
 *
 * @property integer $id
 * @property integer $compra_id
 * @property integer $producto_id
 * @property integer $cantidad
 * @property double $vr_unitario
 * @property double $vr_detalle
 *
 * @property Compra $compra
 * @property Producto $producto
 */
class CompraDetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compra_detalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto_id', 'cantidad', 'vr_unitario', 'vr_detalle', 'puntos_detalle'], 'required'],
            [['compra_id', 'producto_id', 'cantidad'], 'integer'],
            [['vr_unitario', 'vr_detalle'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'compra_id' => 'Compra ID',
            'producto_id' => 'Producto ID',
            'cantidad' => 'Cant',
            'vr_unitario' => 'Vr Unit',
            'vr_detalle' => 'Vr Det',
            'puntos_detalle'=>'Pts Det'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompra()
    {
        return $this->hasOne(Compra::className(), ['id' => 'compra_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_id']);
    }
}
