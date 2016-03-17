<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venta;

/**
 * VentaSearch represents the model behind the search form about `app\models\Venta`.
 */
class VentaSearch extends Venta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'socio_id'], 'integer'],
            [['cliente_id','fecha'], 'safe'],
            [['vr_total', 'vr_descuento', 'total_pagar'], 'number'],
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
        $query = Venta::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                              'pageSize' => 5,
                            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('cliente');
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
            'vr_total' => $this->vr_total,
            'vr_descuento' => $this->vr_descuento,
            'total_pagar' => $this->total_pagar,
            //'cliente_id' => $this->cliente_id,
            'socio_id' => $this->socio_id,
        ]);
        $query->andFilterWhere(['like', 'persona.nombres', $this->cliente_id])
              ->orFilterWhere(['like', 'persona.apellidos', $this->cliente_id]);
              
        return $dataProvider;
    }
}
