<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prestamo_detalle".
 *
 * @property integer $id
 * @property integer $prestamo_id
 * @property integer $producto_pago
 * @property integer $cantidad_pago
 * @property double $vr_pagado
 *
 * @property Prestamo $prestamo
 * @property Producto $productoPago
 */
class PrestamoDetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestamo_detalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prestamo_id', 'producto_pago', 'cantidad_pago', 'vr_pagado'], 'required'],
            [['prestamo_id', 'producto_pago', 'cantidad_pago'], 'integer'],
            [['vr_pagado'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prestamo_id' => 'Prestamo ID',
            'producto_pago' => 'Producto Pago',
            'cantidad_pago' => 'Cantidad Pago',
            'vr_pagado' => 'Vr Pagado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamo()
    {
        return $this->hasOne(Prestamo::className(), ['id' => 'prestamo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoPago()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_pago']);
    }
}
