<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "follow".
 *
 * @property integer $follow_id
 * @property integer $user_id_follower
 * @property integer $user_id_following
 *
 * @property User $userIdFollower
 * @property User $userIdFollowing
 */
class Follow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'follow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id_follower', 'user_id_following'], 'required'],
            [['user_id_follower', 'user_id_following'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'follow_id' => 'Follow ID',
            'user_id_follower' => 'User Id Follower',
            'user_id_following' => 'User Id Following',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdFollower()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id_follower']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdFollowing()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id_following']);
    }
}
