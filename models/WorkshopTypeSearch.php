<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkshopType;

/**
 * WorkshopTypeSearch represents the model behind the search form of `app\models\WorkshopType`.
 */
class WorkshopTypeSearch extends WorkshopType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_workshop_type'], 'integer'],
            [['workshop_type'], 'safe'],
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
        $query = WorkshopType::find();

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
            'id_workshop_type' => $this->id_workshop_type,
        ]);

        $query->andFilterWhere(['like', 'workshop_type', $this->workshop_type]);

        return $dataProvider;
    }
}
