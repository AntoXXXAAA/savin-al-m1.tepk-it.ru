<?php

use app\models\WorkshopType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\WorkshopTypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Типы цехов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать тип цеха', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_workshop_type',
            [
                'attribute' => 'workshop_type',
                'label' => 'Тип цеха'
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkshopType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_workshop_type' => $model->id_workshop_type]);
                 }
            ],
        ],
    ]); ?>


</div>
