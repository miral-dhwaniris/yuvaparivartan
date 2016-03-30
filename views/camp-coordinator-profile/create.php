<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CampCoordinatorProfile */

$this->title = 'Create Camp Coordinator Profile';
$this->params['breadcrumbs'][] = ['label' => 'Camp Coordinator Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camp-coordinator-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
