<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_profile_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'profile_picture') ?>

    <?= $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'work_address') ?>

    <?php // echo $form->field($model, 'qualification') ?>

    <?php // echo $form->field($model, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
