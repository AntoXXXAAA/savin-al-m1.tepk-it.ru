<?php

use app\models\MaterialType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MaterialTypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Материалы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать материал', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_material_type',
            [
                'attribute' => 'material_type',
                'label' => 'Материал'
            ],
            [
                'attribute' => 'percentage_material_losses',
                'label' => 'Процент брака'
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MaterialType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_material_type' => $model->id_material_type]);
                 }
            ],
        ],
    ]); ?>


</div>
