<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_comments".
 *
 * @property string $owner_name
 * @property integer $owner_id
 * @property integer $comment_id
 * @property integer $parent_comment_id
 * @property integer $creator_id
 * @property string $user_name
 * @property string $user_email
 * @property string $comment_text
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $status
 */
class TblComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_name', 'owner_id'], 'required'],
            [['owner_id', 'parent_comment_id', 'creator_id', 'create_time', 'update_time', 'status'], 'integer'],
            [['comment_text'], 'string'],
            [['owner_name'], 'string', 'max' => 50],
            [['user_name', 'user_email'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'owner_name' => 'Owner Name',
            'owner_id' => 'Owner ID',
            'comment_id' => 'Comment ID',
            'parent_comment_id' => 'Parent Comment ID',
            'creator_id' => 'Creator ID',
            'user_name' => 'User Name',
            'user_email' => 'User Email',
            'comment_text' => 'Comment Text',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'status' => 'Status',
        ];
    }
}
