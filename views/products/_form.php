<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_type_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\ProductType::find()->all(), 'id_product_type', 'product_type'),
        ['prompt' => 'Выберите тип товара', 'required' => true]
    )->label('Тип товара') ?>

    <?= $form->field($model, 'material_type_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\MaterialType::find()->all(), 'id_material_type', 'material_type'),
        ['prompt' => 'Выберите материал', 'required' => true]
    )->label('Материал') ?>

    <?= $form->field($model, 'products_name')->textInput([
        'maxlength' => 255,
        'required' => true,
        'pattern' => '^[А-Яа-яЁё\w\s\-]+$',
        'title' => 'Только буквы, цифры, пробелы и дефисы',
        'placeholder' => 'Например: Стол обеденный'
    ])->label('Название') ?>

    <?= $form->field($model, 'article')->textInput([
        'type' => 'number',
        'min' => 1,
        'max' => 2147483647,
        'required' => true,
        'title' => 'Только целые числа',
        'placeholder' => 'Например: 123456'
    ])->label('Артикул') ?>

    <?= $form->field($model, 'min_price_partner')->textInput([
        'type' => 'number',
        'min' => 0.01,
        'max' => 999999.9999,
        'step' => 0.01,
        'required' => true,
        'title' => 'Допустимые значения: 0.01-999999.9999',
        'placeholder' => 'Например: 1250.99'
    ])->label('Минимальная цена для партнёра') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
