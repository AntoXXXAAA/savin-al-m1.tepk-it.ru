<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MaterialType $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="material-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'material_type')->textInput([
        'maxlength' => 255,
        'required' => true,
        'pattern' => '^[А-Яа-яЁё\w\s\-]+$',
        'title' => 'Только буквы, цифры, пробелы и дефисы',
        'placeholder' => 'Например: Дерево дубовое'
    ])->label('Материал') ?>

    <?= $form->field($model, 'percentage_material_losses')->textInput([
        'type' => 'number',
        'min' => 0,
        'max' => 100,
        'step' => 0.0001,
        'required' => true,
        'title' => 'Допустимые значения: 0-100 с точностью до 4 знаков',
        'placeholder' => 'Например: 5.2500'
    ])->label('Процент брака') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
