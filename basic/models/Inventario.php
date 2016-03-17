<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario".
 *
 * @property integer $id
 * @property integer $socio_id
 * @property integer $producto_id
 * @property integer $cantidad_fisico
 * @property integer $cantidad_prestamo
 *
 * @property Persona $socio
 * @property Producto $producto
 */
class Inventario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['socio_id', 'producto_id', 'cantidad_fisico', 'cantidad_prestamo'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'socio_id' => 'Socio ID',
            'producto_id' => 'Producto ID',
            'cantidad_fisico' => 'Cantidad Fisico',
            'cantidad_prestamo' => 'Cantidad Prestamo',
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
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_id']);
    }
}
