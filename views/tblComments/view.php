<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblComments */

$this->title = $model->comment_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->comment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->comment_id], [
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
            'owner_name',
            'owner_id',
            'comment_id',
            'parent_comment_id',
            'creator_id',
            'user_name',
            'user_email:email',
            'comment_text:ntext',
            'create_time:datetime',
            'update_time:datetime',
            'status',
        ],
    ]) ?>

</div>
