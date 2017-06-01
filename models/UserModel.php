<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $email
 * @property string $password
 *
 * @property Attachment[] $attachments
 * @property Endorsement[] $endorsements
 * @property Endorsement[] $endorsements0
 * @property Follow[] $follows
 * @property Follow[] $follows0
 * @property Like[] $likes
 * @property Share[] $shares
 * @property Tag[] $tags
 * @property UserProfile[] $userProfiles
 */
class UserModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['username', 'email', 'password'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachments()
    {
        return $this->hasMany(Attachment::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndorsements()
    {
        return $this->hasMany(Endorsement::className(), ['user_id_endorsed' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndorsements0()
    {
        return $this->hasMany(Endorsement::className(), ['user_id_endorser' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFollows()
    {
        return $this->hasMany(Follow::className(), ['user_id_follower' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFollows0()
    {
        return $this->hasMany(Follow::className(), ['user_id_following' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShares()
    {
        return $this->hasMany(Share::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles()
    {
        return $this->hasMany(UserProfile::className(), ['user_id' => 'user_id']);
    }
}
