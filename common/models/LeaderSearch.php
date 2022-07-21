<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Leader;

/**
 * LeaderSearch represents the model behind the search form about `common\models\Leader`.
 */
class LeaderSearch extends Leader
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['fio', 'phone', 'email', 'work_day', 'resume', 'image', 'task', 'position', 'category'], 'safe'],
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
        $query = Leader::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'work_day', $this->work_day])
            ->andFilterWhere(['like', 'resume', $this->resume])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'task', $this->task])
            ->andFilterWhere(['like', 'position', $this->task])
            ->andFilterWhere(['like', 'category', $this->task]);

        return $dataProvider;
    }
}
