<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MeetKeyPerson */

$this->title = 'Create Meet Key Person';
$this->params['breadcrumbs'][] = ['label' => 'Meet Key People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meet-key-person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
