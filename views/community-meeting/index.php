<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CampSearchCommunityMeeting */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Community Meetings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="community-meeting-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Community Meeting', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'state',
            'id',
            'district',
            'block',
            'village',
            // 'camp_coordinator',
            // 'meeting_date',
            // 'number_of_people_in_meeting',
            // 'timestamp',
            // 'upload_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
