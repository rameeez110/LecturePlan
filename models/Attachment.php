<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attachment".
 *
 * @property integer $attachment_id
 * @property integer $user_id
 * @property string $attachment_type
 * @property string $attachment_title
 * @property string $attachment_meta
 * @property string $attachment_tags
 * @property string $attachment_details
 *
 * @property User $user
 * @property Like[] $likes
 * @property Share[] $shares
 */
class Attachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'attachment_type', 'attachment_title', 'attachment_meta', 'attachment_tags', 'attachment_details'], 'required'],
            [['user_id'], 'integer'],
            [['attachment_type', 'attachment_title', 'attachment_tags'], 'string', 'max' => 255],
            [['attachment_meta'], 'string', 'max' => 1000],
            [['attachment_details'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attachment_id' => 'Attachment ID',
            'user_id' => 'User ID',
            'attachment_type' => 'Attachment Type',
            'attachment_title' => 'Attachment Title',
            'attachment_meta' => 'Attachment Meta',
            'attachment_tags' => 'Attachment Tags',
            'attachment_details' => 'Attachment Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::className(), ['attachment_id' => 'attachment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShares()
    {
        return $this->hasMany(Share::className(), ['attachment_id' => 'attachment_id']);
    }
}
