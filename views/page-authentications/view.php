<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PageAuthentications */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Page Authentications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-authentications-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'action',
            'approve_to',
            'level_id',
        ],
    ]) ?>

</div>
