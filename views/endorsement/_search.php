<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EndorsementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="endorsement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'endorsement_id') ?>

    <?= $form->field($model, 'user_id_endorsed') ?>

    <?= $form->field($model, 'user_id_endorser') ?>

    <?= $form->field($model, 'endorsement_meta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
