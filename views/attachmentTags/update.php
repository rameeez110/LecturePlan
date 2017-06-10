<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AttachmentTags */

$this->title = 'Update Attachment Tags: ' . ' ' . $model->attachment_tags_id;
$this->params['breadcrumbs'][] = ['label' => 'Attachment Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->attachment_tags_id, 'url' => ['view', 'id' => $model->attachment_tags_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attachment-tags-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
