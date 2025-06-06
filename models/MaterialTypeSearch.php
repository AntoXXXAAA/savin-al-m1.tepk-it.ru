<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaterialType;

/**
 * MaterialTypeSearch represents the model behind the search form of `app\models\MaterialType`.
 */
class MaterialTypeSearch extends MaterialType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material_type'], 'integer'],
            [['material_type'], 'safe'],
            [['percentage_material_losses'], 'number'],
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
        $query = MaterialType::find();

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
            'id_material_type' => $this->id_material_type,
            'percentage_material_losses' => $this->percentage_material_losses,
        ]);

        $query->andFilterWhere(['like', 'material_type', $this->material_type]);

        return $dataProvider;
    }
}
