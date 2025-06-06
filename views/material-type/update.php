<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MaterialType $model */

$this->title = "Обновить материал: {$model->material_type}";
$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->material_type, 'url' => ['view', 'id_material_type' => $model->id_material_type]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="material-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
