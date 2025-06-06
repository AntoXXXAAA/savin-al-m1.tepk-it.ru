<?php

use app\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_products',
            [
                'attribute' => 'product_type_id',
                'value' => function($model) {
                    return $model->productType ? $model->productType->product_type : '(не задано)';
                },
                'label' => 'Тип товара',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\ProductType::find()->all(), 'id_product_type', 'product_type'),
            ],
            [
                'attribute' => 'material_type_id',
                'value' => function($model) {
                    return $model->materialType ? $model->materialType->material_type : '(не задано)';
                },
                'label' => 'Материал',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\MaterialType::find()->all(), 'id_material_type', 'material_type'),
            ],
            [
                'attribute' => 'products_name',
                'label' => 'Название'
            ],
            [
                'attribute' => 'article',
                'label' => 'Артикул'
            ],
            [
                'attribute' => 'min_price_partner',
                'label' => 'Минимальная цена для партнёра'
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_products' => $model->id_products]);
                 }
            ],
        ],
    ]); ?>


</div>
