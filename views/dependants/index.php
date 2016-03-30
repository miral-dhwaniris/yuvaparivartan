<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DependantsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dependants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dependants-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dependants', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    
    
<?php
$form = yii\widgets\ActiveForm::begin([
           'action' => ['index'],
           'method' => 'get',
]);
?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=> 'Sr. Num'],

            'id',
            'centre_list:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    
<div class="form-group" style="display: none;">
    <?= Html::submitButton('s') ?>
</div>
<?php yii\widgets\ActiveForm::end(); ?>
    

    
</div>
