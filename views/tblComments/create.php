<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblComments */

$this->title = 'Create Tbl Comments';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
