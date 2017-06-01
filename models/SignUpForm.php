<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * SignUpForm class.
 * SignUpForm is the data structure for keeping
 * user sign up form data. It is used by the 'signUp' action of 'SiteController'.
 */
class SignUpForm extends Model
{
	public $name;
	public $email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name and email are both required
            [['name', 'email'], 'required'],
            // email is validated
            ['email', 'email'],
        ];
    }
}
