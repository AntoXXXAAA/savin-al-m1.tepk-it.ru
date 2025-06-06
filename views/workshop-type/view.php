<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\WorkshopType $model */

$this->title = $model->workshop_type;
$this->params['breadcrumbs'][] = ['label' => 'Типы цехов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workshop-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_workshop_type' => $model->id_workshop_type], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_workshop_type' => $model->id_workshop_type], [
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
            [
                'label' => 'ID типа цеха',
                'value' => $model->id_workshop_type,
            ],
            [
                'label' => 'Тип цеха',
                'value' => $model->workshop_type,
            ],
        ],
    ]) ?>

</div>
