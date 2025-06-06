<?php
use yii\widgets\ListView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Время изготовления продукции';
?>
<div class="products-manufacturing container mt-4">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView'     => '_product_card',
        'layout'       => "{items}\n<div class=\"mt-3\">{pager}</div>",
        'options'      => ['class' => 'row'],
        'itemOptions'  => ['class' => 'col-12 mb-4'],
        'emptyText'    => '<p>Продукция не найдена.</p>',
        'pager'        => [
            'options'        => ['class' => 'pagination'],
            'maxButtonCount' => 5,
        ],
    ]); ?>
</div>