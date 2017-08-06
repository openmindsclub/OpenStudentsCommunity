<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tag;

/**
 * TagSearch represents the model behind the search form about `frontend\models\Tag`.
 */
class TagSearch extends Tag
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_id'], 'integer'],
            [['tag_name', 'tag_description'], 'safe'],
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
        $query = Tag::find();

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
            'tag_id' => $this->tag_id,
        ]);

        $query->andFilterWhere(['like', 'tag_name', $this->tag_name])
            ->andFilterWhere(['like', 'tag_description', $this->tag_description]);

        return $dataProvider;
    }
}
