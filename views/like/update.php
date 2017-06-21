<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Like */

$this->title = 'Update Like: ' . ' ' . $model->like_id;
$this->params['breadcrumbs'][] = ['label' => 'Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->like_id, 'url' => ['view', 'id' => $model->like_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="like-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
