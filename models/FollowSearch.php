<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Follow;

/**
 * FollowSearch represents the model behind the search form about `app\models\Follow`.
 */
class FollowSearch extends Follow
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['follow_id', 'user_id_follower', 'user_id_following'], 'integer'],
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
        $query = Follow::find();

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
            'follow_id' => $this->follow_id,
            'user_id_follower' => $this->user_id_follower,
            'user_id_following' => $this->user_id_following,
        ]);

        return $dataProvider;
    }
}
