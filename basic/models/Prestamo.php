<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prestamo".
 *
 * @property integer $id
 * @property integer $socio_origen
 * @property integer $socio_destino
 * @property string $fecha
 * @property integer $producto_prestado
 * @property integer $cantidad_prestada
 * @property integer $vr_prestado
 * @property string $estado
 *
 * @property Persona $socioOrigen
 * @property Persona $socioDestino
 * @property Producto $productoPrestado
 * @property PrestamoDetalle[] $prestamoDetalles
 */
class Prestamo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestamo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['socio_origen', 'socio_destino', 'fecha', 'producto_prestado', 'cantidad_prestada', 'vr_prestado'], 'required'],
            [['socio_origen', 'socio_destino', 'producto_prestado', 'cantidad_prestada', 'vr_prestado'], 'integer'],
            [['fecha'], 'safe'],
            [['estado'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'socio_origen' => 'Socio Origen',
            'socio_destino' => 'Socio Destino',
            'fecha' => 'Fecha',
            'producto_prestado' => 'Producto Prestado',
            'cantidad_prestada' => 'Cantidad Prestada',
            'vr_prestado' => 'Vr Prestado',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocioOrigen()
    {
        return $this->hasOne(Persona::className(), ['id' => 'socio_origen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocioDestino()
    {
        return $this->hasOne(Persona::className(), ['id' => 'socio_destino']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoPrestado()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_prestado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamoDetalles()
    {
        return $this->hasMany(PrestamoDetalle::className(), ['prestamo_id' => 'id']);
    }
}
