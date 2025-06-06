<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Workshops $model */

$this->title = 'Обновить цех: ' . $model->workshop_name;
$this->params['breadcrumbs'][] = ['label' => 'Цеха', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->workshop_name, 'url' => ['view', 'id_workshops' => $model->id_workshops]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="workshops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
