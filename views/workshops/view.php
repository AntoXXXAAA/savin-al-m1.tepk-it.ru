<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Workshops $model */

$this->title = $model->workshop_name;
$this->params['breadcrumbs'][] = ['label' => 'Цеха', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workshops-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_workshops' => $model->id_workshops], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_workshops' => $model->id_workshops], [
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
                'label' => 'ID цеха',
                'value' => $model->id_workshops,
            ],
            [
                'label' => 'Название',
                'value' => $model->workshop_name,
            ],
            [
                'label' => 'Тип цеха',
                'value' => $model->workshopType->workshop_type,
            ],
            [
                'label' => 'Количество работников',
                'value' => $model->count_people,
            ],
        ],
    ]) ?>

</div>
