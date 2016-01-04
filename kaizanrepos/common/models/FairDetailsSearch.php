<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FairDetails;

/**
 * FairDetailsSearch represents the model behind the search form about `common\models\FairDetails`.
 */
class FairDetailsSearch extends FairDetails
{
    public $searchstring;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['searchstring','title', 'description', 'attachment', 'last_updated'], 'safe'],
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
        $query = FairDetails::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

//        $query->andFilterWhere([
//            'id' => $this->id,
//            'last_updated' => $this->last_updated,
//        ]);

        $query->orFilterWhere(['like', 'title', $this->searchstring])
            ->orFilterWhere(['like', 'description', $this->searchstring]);
        return $dataProvider;
    }
}
