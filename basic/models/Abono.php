<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "abono".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $socio_id
 * @property integer $cliente_id
 * @property double $valor
 *
 * @property Persona $socio
 * @property Persona $cliente
 */
class Abono extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'abono';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'socio_id', 'cliente_id', 'valor'], 'required'],
            [['fecha'], 'safe'],
            [['socio_id', 'cliente_id'], 'integer'],
            [['valor'], 'number']
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
            'socio_id' => 'Socio ID',
            'cliente_id' => 'Cliente ID',
            'valor' => 'Valor',
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
}
