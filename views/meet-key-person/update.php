<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MeetKeyPerson */

$this->title = 'Update Meet Key Person: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Meet Key People', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meet-key-person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
