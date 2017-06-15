<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Endorsement */

$this->title = 'Update Endorsement: ' . ' ' . $model->endorsement_id;
$this->params['breadcrumbs'][] = ['label' => 'Endorsements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->endorsement_id, 'url' => ['view', 'id' => $model->endorsement_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="endorsement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
