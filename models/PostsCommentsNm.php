<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts_comments_nm".
 *
 * @property string $postId
 * @property string $commentId
 */
class PostsCommentsNm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts_comments_nm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['postId', 'commentId'], 'required'],
            [['postId', 'commentId'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'postId' => 'Post ID',
            'commentId' => 'Comment ID',
        ];
    }
}
