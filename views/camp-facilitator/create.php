<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CampFacilitator */

$this->title = 'Create Camp Facilitator';
$this->params['breadcrumbs'][] = ['label' => 'Camp Facilitators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camp-facilitator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
