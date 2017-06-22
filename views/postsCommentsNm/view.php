<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PostsCommentsNm */

$this->title = $model->postId;
$this->params['breadcrumbs'][] = ['label' => 'Posts Comments Nms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-comments-nm-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'postId' => $model->postId, 'commentId' => $model->commentId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'postId' => $model->postId, 'commentId' => $model->commentId], [
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
            'postId',
            'commentId',
        ],
    ]) ?>

</div>
