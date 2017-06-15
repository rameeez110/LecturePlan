<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Endorsement */

$this->title = $model->endorsement_id;
$this->params['breadcrumbs'][] = ['label' => 'Endorsements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="endorsement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->endorsement_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->endorsement_id], [
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
            'endorsement_id',
            'user_id_endorsed',
            'user_id_endorser',
            'endorsement_meta',
        ],
    ]) ?>

</div>
