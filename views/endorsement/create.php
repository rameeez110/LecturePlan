<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Endorsement */

$this->title = 'Create Endorsement';
$this->params['breadcrumbs'][] = ['label' => 'Endorsements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="endorsement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
