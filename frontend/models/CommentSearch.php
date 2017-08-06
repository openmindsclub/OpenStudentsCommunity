<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Comment;

/**
 * CommentSearch represents the model behind the search form about `frontend\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_id', 'user_id', 'publication_id', 'comment_rate'], 'integer'],
            [['comment_text_content', 'comment_file_path', 'comment_creation_time'], 'safe'],
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
        $query = Comment::find();

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
            'comment_id' => $this->comment_id,
            'user_id' => $this->user_id,
            'publication_id' => $this->publication_id,
            'comment_creation_time' => $this->comment_creation_time,
            'comment_rate' => $this->comment_rate,
        ]);

        $query->andFilterWhere(['like', 'comment_text_content', $this->comment_text_content])
            ->andFilterWhere(['like', 'comment_file_path', $this->comment_file_path]);

        return $dataProvider;
    }
}
