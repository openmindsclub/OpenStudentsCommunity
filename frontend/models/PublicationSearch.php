<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Publication;

/**
 * PublicationSearch represents the model behind the search form about `frontend\models\Publication`.
 */
class PublicationSearch extends Publication
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publication_id', 'user_id', 'module_id', 'tag_id', 'publication_place', 'publication_rate'], 'integer'],
            [['publication_name', 'publication_text_content', 'publication_directory', 'publication_creation_time', 'publication_date'], 'safe'],
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
        $query = Publication::find();

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
            'publication_id' => $this->publication_id,
            'user_id' => $this->user_id,
            'module_id' => $this->module_id,
            'tag_id' => $this->tag_id,
            'publication_creation_time' => $this->publication_creation_time,
            'publication_place' => $this->publication_place,
            'publication_date' => $this->publication_date,
            'publication_rate' => $this->publication_rate,
        ]);

        $query->andFilterWhere(['like', 'publication_name', $this->publication_name])
            ->andFilterWhere(['like', 'publication_text_content', $this->publication_text_content])
            ->andFilterWhere(['like', 'publication_directory', $this->publication_directory]);

        return $dataProvider;
    }
}
