<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $denominacion
 * @property integer $codigo
 * @property double $puntos
 * @property double $vr_neto
 * @property double $vr_publico
 * @property integer $linea_id
 *
 * @property CompraDetalle[] $compraDetalles
 * @property Inventario[] $inventarios
 * @property Prestamo[] $prestamos
 * @property PrestamoDetalle[] $prestamoDetalles
 * @property Linea $linea
 * @property VentaDetalle[] $ventaDetalles
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'denominacion', 'codigo', 'puntos', 'vr_neto', 'vr_publico', 'linea_id'], 'required'],
            [['codigo'], 'integer'],
            [['puntos', 'vr_neto', 'vr_publico'], 'number'],
            [['nombre'], 'string', 'max' => 500],
            [['denominacion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'denominacion' => 'Denominacion',
            'codigo' => 'Codigo',
            'puntos' => 'Puntos',
            'vr_neto' => 'Vr Neto',
            'vr_publico' => 'Vr Publico',
            'linea_id' => 'Linea',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompraDetalles()
    {
        return $this->hasMany(CompraDetalle::className(), ['producto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::className(), ['producto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamo::className(), ['producto_prestado' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamoDetalles()
    {
        return $this->hasMany(PrestamoDetalle::className(), ['producto_pago' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinea()
    {
        return $this->hasOne(Linea::className(), ['id' => 'linea_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaDetalles()
    {
        return $this->hasMany(VentaDetalle::className(), ['producto_id' => 'id']);
    }

    // public function getNombre()
    // {
    //     return $this->nombre;
    // }
}
