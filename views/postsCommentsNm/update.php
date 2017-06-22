<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PostsCommentsNm */

$this->title = 'Update Posts Comments Nm: ' . ' ' . $model->postId;
$this->params['breadcrumbs'][] = ['label' => 'Posts Comments Nms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->postId, 'url' => ['view', 'postId' => $model->postId, 'commentId' => $model->commentId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posts-comments-nm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
