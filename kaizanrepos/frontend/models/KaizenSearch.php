<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Kaizen;

/**
 * KaizenSearch represents the model behind the search form about `frontend\models\Kaizen`.
 */
class KaizenSearch extends Kaizen
{
    public $searchstring;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category', 'postedby', 'recordstatus'], 'integer'],
            [['searchstring','name','subject','description', 'processarea', 'company', 'currrentstage', 'mode', 'tangiblebenifits', 'intengiblebenifits', 'implementationdate', 'posteddate', 'suggestedby', 'approvedby'], 'safe'],
            [['costsaving'], 'number'],
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
        $query = Kaizen::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere([
            'id' => $this->id,
            'category' => $this->searchstring,
            'costsaving' => $this->searchstring,
            'implementationdate' => $this->searchstring,
            'postedby' => $this->searchstring,
            'posteddate' => $this->searchstring,
            'recordstatus' => $this->searchstring,
        ]);

        $query->orFilterWhere(['like', 'name', $this->searchstring])
            ->orFilterWhere(['like', 'subject', $this->searchstring])
            ->orFilterWhere(['like', 'description', $this->searchstring])
            ->orFilterWhere(['like', 'processarea', $this->searchstring])
            ->orFilterWhere(['like', 'company', $this->searchstring])           
            ->orFilterWhere(['like', 'currrentstage', $this->searchstring])
            ->orFilterWhere(['like', 'mode', $this->searchstring])
            ->orFilterWhere(['like', 'tangiblebenifits', $this->searchstring])
            ->orFilterWhere(['like', 'intengiblebenifits', $this->searchstring])
            ->orFilterWhere(['like', 'suggestedby', $this->searchstring])
            ->orFilterWhere(['like', 'approvedby', $this->searchstring]);

        return $dataProvider;
    }
}
