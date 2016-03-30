<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CampFacilitatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Camp Facilitators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camp-facilitator-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Camp Facilitator', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'camp',
            'address',
            'course',
            // 'photo',
            // 'timestamp',
            // 'upload_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
