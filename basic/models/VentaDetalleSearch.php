<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VentaDetalle;

/**
 * VentaDetalleSearch represents the model behind the search form about `app\models\VentaDetalle`.
 */
class VentaDetalleSearch extends VentaDetalle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'venta_id', 'producto_id', 'cantidad', 'vr_unitario', 'vr_detalle'], 'integer'],
            [['porc_descuento', 'vr_descuento', 'total_detalle'], 'number'],
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
        $query = VentaDetalle::find();

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
            'venta_id' => $this->venta_id,
            'producto_id' => $this->producto_id,
            'cantidad' => $this->cantidad,
            'vr_unitario' => $this->vr_unitario,
            'vr_detalle' => $this->vr_detalle,
            'porc_descuento' => $this->porc_descuento,
            'vr_descuento' => $this->vr_descuento,
            'total_detalle' => $this->total_detalle,
        ]);

        return $dataProvider;
    }
}
