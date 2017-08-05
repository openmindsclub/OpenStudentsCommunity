<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Module;

/**
 * ModuleSearch represents the model behind the search form about `frontend\models\Module`.
 */
class ModuleSearch extends Module
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_id', 'specialty_id'], 'integer'],
            [['module_name', 'module_description'], 'safe'],
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
        $query = Module::find();

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
            'module_id' => $this->module_id,
            'specialty_id' => $this->specialty_id,
        ]);

        $query->andFilterWhere(['like', 'module_name', $this->module_name])
            ->andFilterWhere(['like', 'module_description', $this->module_description]);

        return $dataProvider;
    }
}
