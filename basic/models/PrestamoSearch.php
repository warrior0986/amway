<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prestamo;

/**
 * PrestamoSearch represents the model behind the search form about `app\models\Prestamo`.
 */
class PrestamoSearch extends Prestamo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'socio_origen', 'socio_destino', 'producto_prestado', 'cantidad_prestada', 'vr_prestado'], 'integer'],
            [['fecha', 'estado'], 'safe'],
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
        $query = Prestamo::find();

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
            'socio_origen' => $this->socio_origen,
            'socio_destino' => $this->socio_destino,
            'fecha' => $this->fecha,
            'producto_prestado' => $this->producto_prestado,
            'cantidad_prestada' => $this->cantidad_prestada,
            'vr_prestado' => $this->vr_prestado,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
