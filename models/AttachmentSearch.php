<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Attachment;

/**
 * AttachmentSearch represents the model behind the search form about `app\models\Attachment`.
 */
class AttachmentSearch extends Attachment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attachment_id', 'user_id'], 'integer'],
            [['attachment_type', 'attachment_title', 'attachment_meta', 'attachment_tags', 'attachment_details'], 'safe'],
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
        $query = Attachment::find();

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
            'attachment_id' => $this->attachment_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'attachment_type', $this->attachment_type])
            ->andFilterWhere(['like', 'attachment_title', $this->attachment_title])
            ->andFilterWhere(['like', 'attachment_meta', $this->attachment_meta])
            ->andFilterWhere(['like', 'attachment_tags', $this->attachment_tags])
            ->andFilterWhere(['like', 'attachment_details', $this->attachment_details]);

        return $dataProvider;
    }
}
