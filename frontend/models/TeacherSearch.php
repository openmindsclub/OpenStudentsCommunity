<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Teacher;

/**
 * TeacherSearch represents the model behind the search form about `frontend\models\Teacher`.
 */
class TeacherSearch extends Teacher
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'user_id', 'school_id', 'domain_id'], 'integer'],
            [['teacher_first_name', 'teacher_last_name', 'teacher_birth_date'], 'safe'],
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
        $query = Teacher::find();

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
            'teacher_id' => $this->teacher_id,
            'user_id' => $this->user_id,
            'school_id' => $this->school_id,
            'domain_id' => $this->domain_id,
            'teacher_birth_date' => $this->teacher_birth_date,
        ]);

        $query->andFilterWhere(['like', 'teacher_first_name', $this->teacher_first_name])
            ->andFilterWhere(['like', 'teacher_last_name', $this->teacher_last_name]);

        return $dataProvider;
    }
}
