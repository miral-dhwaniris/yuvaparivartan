<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DoorToDoorMeetingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Door To Door Meetings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="door-to-door-meeting-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Door To Door Meeting', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'state',
            'district',
            'block',
            'village',
            // 'camp_coordinator',
            // 'meeting_date',
            // 'number_of_households_visited',
            // 'number_of_target_groups_met',
            // 'timestamp',
            // 'upload_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
