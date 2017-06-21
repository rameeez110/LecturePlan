<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property string $id
 * @property string $message
 * @property string $userId
 * @property string $createDate
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['userId'], 'integer'],
            [['createDate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'userId' => 'User ID',
            'createDate' => 'Create Date',
        ];
    }
}
