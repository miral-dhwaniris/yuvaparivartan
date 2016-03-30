<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MeetKeyPersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meet Key People';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meet-key-person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Meet Key Person', ['create'], ['class' => 'btn btn-success']) ?>
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
            'meeting_date',
            // 'name_of_person',
            // 'role',
            // 'phone_number',
            // 'photo',
            // 'timestamp',
            // 'upload_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
