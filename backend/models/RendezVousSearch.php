<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Student;

/**
 * RendezVousSearch represents the model behind the search form about `frontend\models\Student`.
 */
class RendezVousSearch extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'user_id', 'school_id'], 'integer'],
            [['student_fisrt_name', 'student_last_name', 'student_birth_date'], 'safe'],
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
        $query = Student::find();

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
            'student_id' => $this->student_id,
            'user_id' => $this->user_id,
            'school_id' => $this->school_id,
            'student_birth_date' => $this->student_birth_date,
        ]);

        $query->andFilterWhere(['like', 'student_fisrt_name', $this->student_fisrt_name])
            ->andFilterWhere(['like', 'student_last_name', $this->student_last_name]);

        return $dataProvider;
    }
}
