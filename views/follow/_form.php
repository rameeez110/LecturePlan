<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Follow */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="follow-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id_follower')->textInput() ?>

    <?= $form->field($model, 'user_id_following')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
