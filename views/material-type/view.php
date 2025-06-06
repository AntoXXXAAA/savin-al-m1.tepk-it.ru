<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MaterialType $model */

$this->title = $model->material_type;
$this->params['breadcrumbs'][] = ['label' => 'Типы материалов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="material-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_material_type' => $model->id_material_type], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_material_type' => $model->id_material_type], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот объект?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id_material_type',
            [
                'label' => 'ID материала',
                'value' => $model->id_material_type,
            ],
//            'material_type',
            [
                'label' => 'Материал',
                'value' => $model->material_type,
            ],
//            'percentage_material_losses',
            [
                'label' => 'Процент брака',
                'value' => $model->percentage_material_losses,
            ],
        ],
    ]) ?>

</div>
