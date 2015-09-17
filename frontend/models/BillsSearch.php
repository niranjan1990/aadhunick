<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Bills;

/**
 * BillsSearch represents the model behind the search form about `frontend\models\Bills`.
 */
class BillsSearch extends Bills
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'watches_id', 'pament_mode', 'quantity'], 'integer'],
            [['billrecord', 'created_at'], 'safe'],
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
        $query = Bills::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'watches_id' => $this->watches_id,
            'pament_mode' => $this->pament_mode,
            'quantity' => $this->quantity,
        ]);

        $query->andFilterWhere(['like', 'billrecord', $this->billrecord])
            ->andFilterWhere(['like', 'created_at', $this->created_at]);

        return $dataProvider;
    }
}