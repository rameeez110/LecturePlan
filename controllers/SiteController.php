<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignUpForm;
use app\models\UserModel;
use yii\bootstrap\ActiveForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo ActiveForm::validate($model);
            Yii::$app->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $username = $_POST['LoginForm']['username'];

            $user = UserModel::find()
                ->where(['username' => $username])
                ->one();

            if(!empty($user)){
                $user_id = $user->user_id;
            }

            $userIsAdmin = false;

            // Jugaad
            if($user_id == 1) {
                $userIsAdmin = true;
            }

            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login() && !$userIsAdmin)
            {
                Yii::$app->session['user_id'] = $user_id;
                return $this->redirect(array('site/index'));
            }

            elseif($model->validate() && $model->login() && $userIsAdmin)
                return $this->redirect(array('site/index'));
            else
                return  $this->redirect(Yii::$app->user->returnUrl);
        }
        // display the login form
        $loggedInUser = Yii::$app->user->id;
        if($loggedInUser) {
            return $this->redirect(array('site/index'));
        }
        else {
            return $this->render('login',array('model'=>$model));
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $model->attributes = $_POST['ContactForm'];
            if($model->validate())
            {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::$app->params['adminEmail'],$subject,$model->body,$headers);
                Yii::$app->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                return $this->refresh();
            }
        }
        return $this->render('contact',array('model'=>$model));
    }

    /**
     * Displays the SignUp page
     */
    public function actionSignUp()
    {
        $model = new SignUpForm;
        $this->render('signup',array('model'=>$model));
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
