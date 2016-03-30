<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DoorToDoorMeeting */

$this->title = 'Create Door To Door Meeting';
$this->params['breadcrumbs'][] = ['label' => 'Door To Door Meetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="door-to-door-meeting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
