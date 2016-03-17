<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Compra;

/**
 * CompraSearch represents the model behind the search form about `app\models\Compra`.
 */
class CompraSearch extends Compra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fecha', 'socio_id'], 'safe'],
            [['vr_compra', 'porc_descuento', 'vr_descuento', 'total_pagar'], 'number'],
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
        $query = Compra::find();

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
        
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
            'vr_compra' => $this->vr_compra,
            'porc_descuento' => $this->porc_descuento,
            'vr_descuento' => $this->vr_descuento,
            'total_pagar' => $this->total_pagar,
            'socio_id'=>$this->socio_id,
        ]);
        return $dataProvider;
    }
}
