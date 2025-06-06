<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductWorkshops;

/**
 * ProductWorkshopsSearch represents the model behind the search form of `app\models\ProductWorkshops`.
 */
class ProductWorkshopsSearch extends ProductWorkshops
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product_workshops', 'product_id', 'workshops_id'], 'integer'],
            [['manufacturing_time'], 'number'],
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
        $query = ProductWorkshops::find();

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
            'id_product_workshops' => $this->id_product_workshops,
            'product_id' => $this->product_id,
            'workshops_id' => $this->workshops_id,
            'manufacturing_time' => $this->manufacturing_time,
        ]);

        return $dataProvider;
    }
}
