<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Products $model */

$this->title = $model->products_name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_products' => $model->id_products], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_products' => $model->id_products], [
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
                'label' => 'ID товара',
                'value' => $model->id_products,
            ],
            [
                'label' => 'Тип товара',
                'value' => $model->productType->product_type,
            ],
            [
                'label' => 'Тип материала',
                'value' => $model->materialType->material_type,
            ],
            [
                'label' => 'Название',
                'value' => $model->products_name,
            ],
            [
                'label' => 'Артикул',
                'value' => $model->article,
            ],
            [
                'label' => 'Минимальная цена для партнёра',
                'value' => $model->min_price_partner,
            ],
        ],
    ]) ?>

</div>
