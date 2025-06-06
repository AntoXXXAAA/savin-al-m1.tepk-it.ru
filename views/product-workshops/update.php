<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshops $model */

$this->title = "Обновить товар: \"{$model->product->products_name}\" цеха: \"{$model->workshops->workshop_name}\"";
$this->params['breadcrumbs'][] = ['label' => 'Производства цехов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Товар: {$model->product->products_name} - Цех: {$model->workshops->workshop_name}", 'url' => ['view', 'id_product_workshops' => $model->id_product_workshops]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="product-workshops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
