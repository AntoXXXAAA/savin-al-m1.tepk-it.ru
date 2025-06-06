<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Workshops $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="workshops-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workshop_name')->textInput([
        'maxlength' => 255,
        'required' => true,
        'pattern' => '^[А-Яа-яЁё\w\s\-]+$',
        'title' => 'Только буквы, цифры, пробелы и дефисы',
        'placeholder' => 'Например: Цех №1'
    ])->label('Название') ?>

    <?= $form->field($model, 'workshop_type_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\WorkshopType::find()->all(), 'id_workshop_type', 'workshop_type'),
        ['prompt' => 'Выберите тип цеха', 'required' => true]
    )->label('Тип цеха') ?>

    <?= $form->field($model, 'count_people')->textInput([
        'type' => 'number',
        'min' => 1,
        'max' => 2147483647,
        'required' => true,
        'title' => 'Только целые числа больше 0',
        'placeholder' => 'Например: 15'
    ])->label('Количество работников') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
