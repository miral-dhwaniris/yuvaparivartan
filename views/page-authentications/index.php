<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PageAuthenticationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Page Authentications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-authentications-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page Authentications', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'action',
            'approve_to',
            'level_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
