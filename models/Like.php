<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "like".
 *
 * @property integer $like_id
 * @property integer $attachment_id
 * @property integer $user_id
 *
 * @property Attachment $attachment
 * @property User $user
 */
class Like extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'like';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attachment_id', 'user_id'], 'required'],
            [['attachment_id', 'user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'like_id' => 'Like ID',
            'attachment_id' => 'Attachment ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachment()
    {
        return $this->hasOne(Attachment::className(), ['attachment_id' => 'attachment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
