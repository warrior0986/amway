<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $id
 * @property string $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property integer $tipo_cliente
 *
 * @property Abono[] $abonos
 * @property Abono[] $abonos0
 * @property Compra[] $compras
 * @property Inventario[] $inventarios
 * @property TipoCliente $tipoCliente
 * @property Prestamo[] $prestamos
 * @property Prestamo[] $prestamos0
 * @property Saldo[] $saldos
 * @property Saldo[] $saldos0
 * @property Venta[] $ventas
 * @property Venta[] $ventas0
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'nombres', 'apellidos', 'email', 'tipo_cliente'], 'required'],
            [['tipo_cliente'], 'integer'],
            [['cedula', 'telefono', 'celular'], 'string', 'max' => 20],
            [['nombres', 'apellidos', 'email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula' => 'Cedula',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'email' => 'Email',
            'tipo_cliente' => 'Tipo Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbonos()
    {
        return $this->hasMany(Abono::className(), ['socio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbonos0()
    {
        return $this->hasMany(Abono::className(), ['cliente_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['socio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::className(), ['socio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCliente()
    {
        return $this->hasOne(TipoCliente::className(), ['id' => 'tipo_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamo::className(), ['socio_origen' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos0()
    {
        return $this->hasMany(Prestamo::className(), ['socio_destino' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaldos()
    {
        return $this->hasMany(Saldo::className(), ['socio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaldos0()
    {
        return $this->hasMany(Saldo::className(), ['cliente_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['socio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas0()
    {
        return $this->hasMany(Venta::className(), ['cliente_id' => 'id']);
    }

    public function getNombre_Completo()
    {
        return $this->nombres.' '.$this->apellidos;
    }
}
