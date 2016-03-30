<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=> 'S No'
                ,'contentOptions'=>['style'=>'width: 60px;text-align: center;']],

            'id',
            'first_name',
            'last_name',
            'user_name',
            [
                'attribute'=>'user_level',
                'content'=>function($data){
                        $modelm = app\models\UserLevels::find()->where(["id"=>$data->user_level])->one();
                        if($modelm!=null)
                        {
                            return $modelm->level_name;
                        }
                }
            ],
            // 'confirm_password',
            // 'user_level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
