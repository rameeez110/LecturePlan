<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "endorsement".
 *
 * @property integer $endorsement_id
 * @property integer $user_id_endorsed
 * @property integer $user_id_endorser
 * @property string $endorsement_meta
 *
 * @property User $userIdEndorsed
 * @property User $userIdEndorser
 */
class Endorsement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'endorsement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id_endorsed', 'user_id_endorser', 'endorsement_meta'], 'required'],
            [['user_id_endorsed', 'user_id_endorser'], 'integer'],
            [['endorsement_meta'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'endorsement_id' => 'Endorsement ID',
            'user_id_endorsed' => 'User Id Endorsed',
            'user_id_endorser' => 'User Id Endorser',
            'endorsement_meta' => 'Endorsement Meta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdEndorsed()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id_endorsed']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdEndorser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id_endorser']);
    }
}
