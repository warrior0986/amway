<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form about `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'codigo'], 'integer'],
            [['linea_id','nombre', 'denominacion'], 'safe'],
            // [['puntos', 'vr_neto', 'vr_publico'], 'number'],
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
        $query = Producto::find();

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
            'codigo' => $this->codigo,
            // 'puntos' => $this->puntos,
            // 'vr_neto' => $this->vr_neto,
            // 'vr_publico' => $this->vr_publico,
            //'linea_id' => $this->linea_id,
        ]);
        $query->joinWith('linea');
        $query->andFilterWhere(['like', 'nombre', $this->nombre])
              ->andFilterWhere(['like', 'denominacion', $this->denominacion])
              ->andFilterWhere(['like', 'linea.descripcion', $this->linea_id]);

        return $dataProvider;
    }
}
