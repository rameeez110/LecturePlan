<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_profile_id
 * @property integer $user_id
 * @property integer $category_id
 * @property string $profile_picture
 * @property integer $age
 * @property string $gender
 * @property string $address
 * @property string $work_address
 * @property string $qualification
 * @property string $name
 *
 * @property User $user
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'profile_picture', 'age', 'gender', 'address', 'work_address', 'qualification', 'name'], 'required'],
            [['user_id', 'category_id', 'age'], 'integer'],
            [['profile_picture', 'gender', 'name'], 'string', 'max' => 255],
            [['address', 'work_address', 'qualification'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_profile_id' => 'User Profile ID',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'profile_picture' => 'Profile Picture',
            'age' => 'Age',
            'gender' => 'Gender',
            'address' => 'Address',
            'work_address' => 'Work Address',
            'qualification' => 'Qualification',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
