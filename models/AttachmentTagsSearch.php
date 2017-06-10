<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AttachmentTags;

/**
 * AttachmentTagsSearch represents the model behind the search form about `app\models\AttachmentTags`.
 */
class AttachmentTagsSearch extends AttachmentTags
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attachment_tags_id', 'attachment_id', 'user_id'], 'integer'],
            [['attachment_tags'], 'safe'],
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
        $query = AttachmentTags::find();

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
            'attachment_tags_id' => $this->attachment_tags_id,
            'attachment_id' => $this->attachment_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'attachment_tags', $this->attachment_tags]);

        return $dataProvider;
    }
}
