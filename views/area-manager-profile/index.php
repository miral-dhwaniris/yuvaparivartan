<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AreaManagerProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Area Manager Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-manager-profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Area Manager Profile', ['create'], ['class' => 'btn btn-success']) ?>
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
