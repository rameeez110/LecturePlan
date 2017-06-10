<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attachment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attachment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'attachment_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachment_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachment_meta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachment_tags')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachment_details')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
