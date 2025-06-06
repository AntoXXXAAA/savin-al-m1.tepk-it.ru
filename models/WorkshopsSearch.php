<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Workshops;

/**
 * WorkshopsSearch represents the model behind the search form of `app\models\Workshops`.
 */
class WorkshopsSearch extends Workshops
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_workshops', 'workshop_type_id', 'count_people'], 'integer'],
            [['workshop_name'], 'safe'],
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
        $query = Workshops::find();

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
            'id_workshops' => $this->id_workshops,
            'workshop_type_id' => $this->workshop_type_id,
            'count_people' => $this->count_people,
        ]);

        $query->andFilterWhere(['like', 'workshop_name', $this->workshop_name]);

        return $dataProvider;
    }
}
