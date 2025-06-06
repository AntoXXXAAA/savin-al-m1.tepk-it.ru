<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshops $model */

$this->title = 'Указать цех для товара';
$this->params['breadcrumbs'][] = ['label' => 'Производства цехов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-workshops-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
