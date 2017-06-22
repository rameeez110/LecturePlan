<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PostsCommentsNm */

$this->title = 'Create Posts Comments Nm';
$this->params['breadcrumbs'][] = ['label' => 'Posts Comments Nms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-comments-nm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
