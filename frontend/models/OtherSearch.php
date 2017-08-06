<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Other;

/**
 * OtherSearch represents the model behind the search form about `frontend\models\Other`.
 */
class OtherSearch extends Other
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['other_id', 'user_id'], 'integer'],
            [['other_first_name', 'other_last_name', 'other_birth_date', 'other_activity'], 'safe'],
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
        $query = Other::find();

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
            'other_id' => $this->other_id,
            'user_id' => $this->user_id,
            'other_birth_date' => $this->other_birth_date,
        ]);

        $query->andFilterWhere(['like', 'other_first_name', $this->other_first_name])
            ->andFilterWhere(['like', 'other_last_name', $this->other_last_name])
            ->andFilterWhere(['like', 'other_activity', $this->other_activity]);

        return $dataProvider;
    }
}
