<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AttachmentTags */

$this->title = $model->attachment_tags_id;
$this->params['breadcrumbs'][] = ['label' => 'Attachment Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attachment-tags-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->attachment_tags_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->attachment_tags_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'attachment_tags_id',
            'attachment_tags',
            'attachment_id',
            'user_id',
        ],
    ]) ?>

</div>
