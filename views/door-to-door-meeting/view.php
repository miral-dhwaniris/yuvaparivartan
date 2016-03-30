<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DoorToDoorMeeting */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Door To Door Meetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="door-to-door-meeting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'state',
            'district',
            'block',
            'village',
            'camp_coordinator',
            'meeting_date',
            'number_of_households_visited',
            'number_of_target_groups_met',
            'timestamp',
            'upload_status',
        ],
    ]) ?>

</div>
