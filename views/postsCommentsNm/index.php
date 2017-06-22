<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostsCommentsNmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts Comments Nms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-comments-nm-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Posts Comments Nm', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'postId',
            'commentId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
