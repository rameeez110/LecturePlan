<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Endorsement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="endorsement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id_endorsed')->textInput() ?>

    <?= $form->field($model, 'user_id_endorser')->textInput() ?>

    <?= $form->field($model, 'endorsement_meta')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
