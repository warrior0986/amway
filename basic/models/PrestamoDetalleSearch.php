<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PrestamoDetalle;

/**
 * PrestamoDetalleSearch represents the model behind the search form about `app\models\PrestamoDetalle`.
 */
class PrestamoDetalleSearch extends PrestamoDetalle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'prestamo_id', 'producto_pago', 'cantidad_pago'], 'integer'],
            [['vr_pagado'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PrestamoDetalle::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'prestamo_id' => $this->prestamo_id,
            'producto_pago' => $this->producto_pago,
            'cantidad_pago' => $this->cantidad_pago,
            'vr_pagado' => $this->vr_pagado,
        ]);

        return $dataProvider;
    }
}
