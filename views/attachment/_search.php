<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AttachmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attachment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'attachment_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'attachment_type') ?>

    <?= $form->field($model, 'attachment_title') ?>

    <?= $form->field($model, 'attachment_meta') ?>

    <?php // echo $form->field($model, 'attachment_tags') ?>

    <?php // echo $form->field($model, 'attachment_details') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
