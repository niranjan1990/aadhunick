<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Watches;

/**
 * WatchesSearch represents the model behind the search form about `frontend\models\Watches`.
 */
class WatchesSearch extends Watches
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'brands_id', 'marketplace_id', 'price'], 'integer'],
            [['modelno'], 'safe'],
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
        $query = Watches::find();
       /* $query->joinWith(['marketplace']);*/

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
            'brands_id' => $this->brands_id,
            'marketplace_id' => $this->marketplace_id,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'modelno', $this->modelno]);

        return $dataProvider;
    }
}