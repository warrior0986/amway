<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "saldo".
 *
 * @property integer $id
 * @property integer $socio_id
 * @property integer $cliente_id
 * @property double $debe
 *
 * @property Persona $socio
 * @property Persona $cliente
 */
class Saldo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'saldo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['socio_id', 'cliente_id', 'debe'], 'required'],
            [['socio_id', 'cliente_id'], 'integer'],
            [['debe'], 'number']
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
            'cliente_id' => 'Cliente ID',
            'debe' => 'Debe',
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
