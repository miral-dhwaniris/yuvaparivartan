<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dependants */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dependants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dependants-view">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'centre_list:ntext',
        ],
    ]) ?>

</div>
