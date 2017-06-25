<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblComments */

$this->title = 'Update Tbl Comments: ' . ' ' . $model->comment_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->comment_id, 'url' => ['view', 'id' => $model->comment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
