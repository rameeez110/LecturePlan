<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Share;

/**
 * ShareSearch represents the model behind the search form about `app\models\Share`.
 */
class ShareSearch extends Share
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['share_id', 'attachment_id', 'user_id'], 'integer'],
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
        $query = Share::find();

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
            'share_id' => $this->share_id,
            'attachment_id' => $this->attachment_id,
            'user_id' => $this->user_id,
        ]);

        return $dataProvider;
    }
}
