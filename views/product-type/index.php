<?php

use app\models\ProductType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductTypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Типы товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать тип товара', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_product_type',
            [
                'attribute' => 'product_type',
                'label' => 'Материал'
            ],
            [
                'attribute' => 'product_type_coefficient',
                'label' => 'Процент брака'
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_product_type' => $model->id_product_type]);
                 }
            ],
        ],
    ]); ?>


</div>
