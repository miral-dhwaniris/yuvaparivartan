<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CampLeaderProfile */

$this->title = 'Create Camp Leader Profile';
$this->params['breadcrumbs'][] = ['label' => 'Camp Leader Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camp-leader-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
