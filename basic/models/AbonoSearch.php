<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Abono;

/**
 * AbonoSearch represents the model behind the search form about `app\models\Abono`.
 */
class AbonoSearch extends Abono
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'socio_id'], 'integer'],
            [['cliente_id','fecha'], 'safe'],
            [['valor'], 'number'],
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
        $query = Abono::find();

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
        $query->joinWith('cliente');
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
            'socio_id' => $this->socio_id,
            //'cliente_id' => $this->cliente_id,
            'valor' => $this->valor,
        ]);
        $query->andFilterWhere(['like', 'persona.nombres', $this->cliente_id])
              ->orFilterWhere(['like', 'persona.apellidos', $this->cliente_id]);
        return $dataProvider;
    }
}
