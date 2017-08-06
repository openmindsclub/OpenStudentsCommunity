<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Specialty;

/**
 * SpecialtySearch represents the model behind the search form about `frontend\models\Specialty`.
 */
class SpecialtySearch extends Specialty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['specialty_id', 'domain_id'], 'integer'],
            [['specialty_name', 'specialty_description'], 'safe'],
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
        $query = Specialty::find();

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
            'specialty_id' => $this->specialty_id,
            'domain_id' => $this->domain_id,
        ]);

        $query->andFilterWhere(['like', 'specialty_name', $this->specialty_name])
            ->andFilterWhere(['like', 'specialty_description', $this->specialty_description]);

        return $dataProvider;
    }
}
