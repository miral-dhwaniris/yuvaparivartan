<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Block', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'district',
            'block',
//            'timestamp',
//            'upload_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
