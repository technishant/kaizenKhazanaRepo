<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FairDetails;

/**
 * FairDetailsSearch represents the model behind the search form about `common\models\FairDetails`.
 */
class FairDetailsSearch extends FairDetails {

    public $searchstring;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['searchstring', 'title', 'description', 'attachment', 'last_updated'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = FairDetails::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->orFilterWhere(['like', 'title', $this->searchstring])
                ->orFilterWhere(['like', 'description', $this->searchstring]);
        return $dataProvider;
    }

}
