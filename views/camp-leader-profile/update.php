<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CampLeaderProfile */

$this->title = 'Update Camp Leader Profile: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Camp Leader Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="camp-leader-profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
