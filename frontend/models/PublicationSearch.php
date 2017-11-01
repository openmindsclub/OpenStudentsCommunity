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
            [['id', 'id_user', 'id_module'], 'integer'],
            [['tag_name', 'publication_name', 'publication_content', 'publicaiton_path', 'publication_time', 'publication_publisher', 'publication_date', 'publication_place'], 'safe'],
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
            'id' => $this->id,
            'id_user' => $this->id_user,
            'id_module' => $this->id_module,
            'publication_time' => $this->publication_time,
            'publication_date' => $this->publication_date,
        ]);

        $query->andFilterWhere(['like', 'tag_name', $this->tag_name])
            ->andFilterWhere(['like', 'publication_name', $this->publication_name])
            ->andFilterWhere(['like', 'publication_content', $this->publication_content])
            ->andFilterWhere(['like', 'publicaiton_path', $this->publicaiton_path])
            ->andFilterWhere(['like', 'publication_publisher', $this->publication_publisher])
            ->andFilterWhere(['like', 'publication_place', $this->publication_place]);

        return $dataProvider;
    }
}
