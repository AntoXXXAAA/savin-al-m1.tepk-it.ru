<?php

use app\models\ProductWorkshops;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshopsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Производства цехов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-workshops-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Указать цех для товара', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_product_workshops',
            [
                'attribute' => 'product_id',
                'value' => function($model) {
                    return $model->product ? $model->product->products_name : '(не задано)';
                },
                'label' => 'Товар',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Products::find()->all(), 'id_products', 'products_name'),
            ],
            [
                'attribute' => 'workshops_id',
                'value' => function($model) {
                    return $model->workshops ? $model->workshops->workshop_name : '(не задано)';
                },
                'label' => 'Цех',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Workshops::find()->all(), 'id_workshops', 'workshop_name'),
            ],
            [
                'attribute' => 'manufacturing_time',
                'label' => 'Время производства'
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductWorkshops $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_product_workshops' => $model->id_product_workshops]);
                 }
            ],
        ],
    ]); ?>


</div>
