<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
        <?php 
            echo Html::a('< Go To Calendar', ['site/index'], ['class' => 'btn btn-primary']) 
        ?>
        <?php 
            echo Html::a('Create Agenda', ['create','other'=>$_GET], ['class' => 'btn btn-success']) 
        ?>
        
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'activity',
            'camp_coordinator',
            'camp',
            'village',

            [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions'=>['style'=>'width: 60px;text-align: center;'],
                    'header'=>'Edit/Update', 
                    'template' => '{update}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'title' => Yii::t('app', 'Update'),                        
                            ]);
                        },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'update') {
                                $url = yii\helpers\Url::to(['agenda/update','id'=>$model->id,'other'=>$_GET]);
                                return $url;
                            }
                    },
                'options' => ['style' => (checkIsAdmin()==true)?'width:140px;':'width:60px;']
            ],
                            
        ],
    ]); ?>

</div>
