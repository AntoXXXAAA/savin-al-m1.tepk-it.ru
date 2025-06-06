<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductType $model */

$this->title = "Обновить тип товара: {$model->product_type}";
$this->params['breadcrumbs'][] = ['label' => 'Типы товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_type, 'url' => ['view', 'id_product_type' => $model->id_product_type]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="product-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
