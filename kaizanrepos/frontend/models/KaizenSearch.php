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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category', 'postedby', 'recordstatus'], 'integer'],
            [['subject', 'processarea', 'company', 'currrentstage', 'mode', 'tangiblebenifits', 'intengiblebenifits', 'implementationdate', 'posteddate', 'suggestedby', 'approvedby'], 'safe'],
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

        $query->andFilterWhere([
            'id' => $this->id,
            'category' => $this->category,
            'costsaving' => $this->costsaving,
            'implementationdate' => $this->implementationdate,
            'postedby' => $this->postedby,
            'posteddate' => $this->posteddate,
            'recordstatus' => $this->recordstatus,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'processarea', $this->processarea])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'currrentstage', $this->currrentstage])
            ->andFilterWhere(['like', 'mode', $this->mode])
            ->andFilterWhere(['like', 'tangiblebenifits', $this->tangiblebenifits])
            ->andFilterWhere(['like', 'intengiblebenifits', $this->intengiblebenifits])
            ->andFilterWhere(['like', 'suggestedby', $this->suggestedby])
            ->andFilterWhere(['like', 'approvedby', $this->approvedby]);

        return $dataProvider;
    }
}
