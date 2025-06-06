<?php
use yii\helpers\Html;

/* @var $model app\models\Products */
?>

<div class="border rounded p-3 mb-4">
    <div class="row">
        <div class="col-md-8">
            <h6 class="mb-2">
                <?= Html::encode($model->productType->product_type ?? 'Тип не указан') ?>
                &nbsp;|&nbsp;
                <?= Html::encode($model->products_name) ?>
            </h6>
            <p class="mb-1 small text-muted">
                <strong>Артикул:</strong>
                <?= Html::encode($model->article) ?>
            </p>
            <p class="mb-1 small text-muted">
                <strong>Мин. стоимость для партнера:</strong>
                <?= Yii::$app->formatter->asDecimal($model->min_price_partner, 2) ?> ₽
            </p>
            <p class="mb-0 small text-muted">
                <strong>Основной материал:</strong>
                <?= Html::encode($model->materialType->material_type ?? 'Не указан') ?>
            </p>
        </div>
        <div class="col-md-4 d-flex align-items-start justify-content-end">
            <div class="text-end">
                <span class="fw-bold">Время изготовления</span>
                <div class="mt-1">
                    <span class="badge bg-primary fs-6">
                        <?= Html::encode($model->getTotalManufacturingTime()) ?> ч
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
