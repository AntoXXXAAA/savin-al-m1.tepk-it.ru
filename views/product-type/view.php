<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ProductType $model */

$this->title = $model->product_type;
$this->params['breadcrumbs'][] = ['label' => 'Типы товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_product_type' => $model->id_product_type], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_product_type' => $model->id_product_type], [
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
                'label' => 'ID типа товара',
                'value' => $model->id_product_type,
            ],
            [
                'label' => 'Тип товара',
                'value' => $model->product_type,
            ],
            [
                'label' => 'Коэффициент типа товара',
                'value' => $model->product_type_coefficient,
            ],
        ],
    ]) ?>

</div>
