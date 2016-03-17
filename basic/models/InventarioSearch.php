<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventario;

/**
 * InventarioSearch represents the model behind the search form about `app\models\Inventario`.
 */
class InventarioSearch extends Inventario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'socio_id', 'producto_id', 'cantidad_fisico', 'cantidad_prestamo'], 'integer'],
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
        $query = Inventario::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                              'pageSize' => 10,
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
            'socio_id' => $this->socio_id,
            'producto_id' => $this->producto_id,
            'cantidad_fisico' => $this->cantidad_fisico,
            'cantidad_prestamo' => $this->cantidad_prestamo,
        ]);

        return $dataProvider;
    }
}
