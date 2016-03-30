<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DoorToDoorMeeting */

$this->title = 'Update Door To Door Meeting: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Door To Door Meetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="door-to-door-meeting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
