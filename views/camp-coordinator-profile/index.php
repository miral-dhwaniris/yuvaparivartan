<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CampCoordinatorProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Camp Coordinator Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camp-coordinator-profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Camp Coordinator Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'address:ntext',
            'age',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
