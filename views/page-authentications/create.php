<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PageAuthentications */

$this->title = 'Create Page Authentications';
$this->params['breadcrumbs'][] = ['label' => 'Page Authentications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-authentications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
