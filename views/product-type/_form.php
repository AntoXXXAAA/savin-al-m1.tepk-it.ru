<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductType $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_type')->textInput([
        'maxlength' => 255,
        'required' => true,
        'pattern' => '^[А-Яа-яЁё\w\s\-]+$',
        'title' => 'Только буквы, цифры, пробелы и дефисы',
        'placeholder' => 'Например: Мебель корпусная'
    ])->label('Тип товара') ?>

    <?= $form->field($model, 'product_type_coefficient')->textInput([
        'type' => 'number',
        'min' => 0.0001,
        'max' => 999999.9999,
        'step' => 0.0001,
        'required' => true,
        'title' => 'Допустимые значения: 0.0001-999999.9999',
        'placeholder' => 'Например: 1.2500'
    ])->label('Коэффициент типа товара') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
