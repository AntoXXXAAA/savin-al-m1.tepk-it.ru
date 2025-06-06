<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshops $model */

$this->title = "Товар: {$model->product->products_name} - Цех: {$model->workshops->workshop_name}";
$this->params['breadcrumbs'][] = ['label' => 'Производства цехов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-workshops-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_product_workshops' => $model->id_product_workshops], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_product_workshops' => $model->id_product_workshops], [
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
                'label' => 'ID производства цеха',
                'value' => $model->id_product_workshops,
            ],
            [
                'label' => 'Товар',
                'value' => $model->product->products_name,
            ],
            [
                'label' => 'Цех',
                'value' => $model->workshops->workshop_name,
            ],
            [
                'label' => 'Время производства',
                'value' => $model->manufacturing_time,
            ],
        ],
    ]) ?>

</div>
