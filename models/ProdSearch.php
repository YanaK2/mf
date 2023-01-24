<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prod;

/**
 * ProdSearch represents the model behind the search form of `app\models\Prod`.
 */
class ProdSearch extends Prod
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prod', 'count', 'price', 'id_cat'], 'integer'],
            [['photo', 'name', 'country', 'color', 'time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Prod::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_prod' => $this->id_prod,
            'count' => $this->count,
            'price' => $this->price,
            'id_cat' => $this->id_cat,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
