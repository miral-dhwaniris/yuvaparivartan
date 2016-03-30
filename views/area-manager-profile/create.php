<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AreaManagerProfile */

$this->title = 'Create Area Manager Profile';
$this->params['breadcrumbs'][] = ['label' => 'Area Manager Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-manager-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
