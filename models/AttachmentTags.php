<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attachment_tags".
 *
 * @property integer $attachment_tags_id
 * @property string $attachment_tags
 * @property integer $attachment_id
 * @property integer $user_id
 */
class AttachmentTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attachment_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attachment_tags', 'attachment_id', 'user_id'], 'required'],
            [['attachment_id', 'user_id'], 'integer'],
            [['attachment_tags'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attachment_tags_id' => 'Attachment Tags ID',
            'attachment_tags' => 'Attachment Tags',
            'attachment_id' => 'Attachment ID',
            'user_id' => 'User ID',
        ];
    }
}
