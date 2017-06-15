<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EndorsementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Endorsements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="endorsement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Endorsement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'endorsement_id',
            'user_id_endorsed',
            'user_id_endorser',
            'endorsement_meta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
