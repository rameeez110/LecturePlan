<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Endorsement;

/**
 * EndorsementSearch represents the model behind the search form about `app\models\Endorsement`.
 */
class EndorsementSearch extends Endorsement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['endorsement_id', 'user_id_endorsed', 'user_id_endorser'], 'integer'],
            [['endorsement_meta'], 'safe'],
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
        $query = Endorsement::find();

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
            'endorsement_id' => $this->endorsement_id,
            'user_id_endorsed' => $this->user_id_endorsed,
            'user_id_endorser' => $this->user_id_endorser,
        ]);

        $query->andFilterWhere(['like', 'endorsement_meta', $this->endorsement_meta]);

        return $dataProvider;
    }
}
