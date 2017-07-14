<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\SignUpForm;

$this->title = Yii::$app->name . ' - Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',

    ]); ?>

        <div id="main_div">
            <div class="welcome">
                <h1 id="welcome_heading">
                    Welcome to Lecture Plan.
                </h1>
                <p id="welcome_paragraph">
                    Lecture Plan keeps track of all your information regarding your course. Personal and Professional.
                </p>
            </div>

            <div id="right_div">
                <div class="background_form">
                    <div class="row">
                        <?= $form->field($model, 'username')->textInput()->input('username', ['placeholder' => "Username"])->label(false) ?>
                    </div>

                    <div class="row">
                        <?= $form->field($model, 'password')->passwordInput()->textInput()->input('password', ['placeholder' => "Password"])->label(false) ?>
                    </div>

                    <div class="row buttons">
                        <?= Html::submitButton('Sign in', ['name' => 'signin', 'id' => 'login_button_main']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

                <!-- Sign Up Form -->
				
                <div class="form" id="signup_form">
                    <?php $form = ActiveForm::begin([
                        'id' => 'sign-up-form',
                    ]); ?>

                    <?php
                    $signUp = new SignUpForm();
                    ?>

                    <!--<div class="signup">
                        <h1 id="signup_heading">
                            New to Lecture Plan?
                        </h1>
                        <div class="separator"></div>

                        <div class="row" id="signup_text">
                            <?= $form->field($signUp, 'name')->textInput()->input('name', ['placeholder' => "Name"])->label(false) ?>
                        </div>

                        <div class="row">
                            <?= $form->field($signUp, 'email')->textInput()->input('email', ['placeholder' => "Email"])->label(false) ?>
                        </div>

                        <div class="row buttons">
                            <?= Html::a('Sign up for Lecture Plan', ['/site/actionUserSignedUp', 'name' => "Test1", 'email' => "Test1@test.com"], ['name' => 'signup', 'class' => 'btn btn-primary', 'id' => 'signup_submit']) ?>
                        </div>

                    </div>
                </div>  -->

                <?php ActiveForm::end(); ?>

            </div>
        </div>



</div>
