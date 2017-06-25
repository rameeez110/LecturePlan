<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblComments;

/**
 * TblCommentsSearch represents the model behind the search form about `app\models\TblComments`.
 */
class TblCommentsSearch extends TblComments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_name', 'user_name', 'user_email', 'comment_text'], 'safe'],
            [['owner_id', 'comment_id', 'parent_comment_id', 'creator_id', 'create_time', 'update_time', 'status'], 'integer'],
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
        $query = TblComments::find();

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
            'owner_id' => $this->owner_id,
            'comment_id' => $this->comment_id,
            'parent_comment_id' => $this->parent_comment_id,
            'creator_id' => $this->creator_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'owner_name', $this->owner_name])
            ->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'comment_text', $this->comment_text]);

        return $dataProvider;
    }
}
