<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Follow */

$this->title = 'Update Follow: ' . ' ' . $model->follow_id;
$this->params['breadcrumbs'][] = ['label' => 'Follows', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->follow_id, 'url' => ['view', 'id' => $model->follow_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="follow-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
