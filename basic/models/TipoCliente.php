<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_cliente".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Persona[] $personas
 */
class TipoCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['tipo_cliente' => 'id']);
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
