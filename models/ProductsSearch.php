<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_products', 'product_type_id', 'article', 'material_type_id'], 'integer'],
            [['products_name'], 'safe'],
            [['min_price_partner'], 'number'],
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
        $query = Products::find();

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
            'id_products' => $this->id_products,
            'product_type_id' => $this->product_type_id,
            'article' => $this->article,
            'min_price_partner' => $this->min_price_partner,
            'material_type_id' => $this->material_type_id,
        ]);

        $query->andFilterWhere(['like', 'products_name', $this->products_name]);

        return $dataProvider;
    }
}
