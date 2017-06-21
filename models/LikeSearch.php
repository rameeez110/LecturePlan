<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Like;

/**
 * LikeSearch represents the model behind the search form about `app\models\Like`.
 */
class LikeSearch extends Like
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['like_id', 'attachment_id', 'user_id'], 'integer'],
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
        $query = Like::find();

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
            'like_id' => $this->like_id,
            'attachment_id' => $this->attachment_id,
            'user_id' => $this->user_id,
        ]);

        return $dataProvider;
    }
}
