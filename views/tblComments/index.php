<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblCommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'owner_name',
            'owner_id',
            'comment_id',
            'parent_comment_id',
            'creator_id',
            // 'user_name',
            // 'user_email:email',
            // 'comment_text:ntext',
            // 'create_time:datetime',
            // 'update_time:datetime',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
