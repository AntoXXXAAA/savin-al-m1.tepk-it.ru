<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\WorkshopType $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="workshop-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workshop_type')->textInput([
        'maxlength' => 255,
        'required' => true,
        'pattern' => '^[А-Яа-яЁё\w\s\-]+$',
        'title' => 'Только буквы, цифры, пробелы и дефисы',
        'placeholder' => 'Например: Деревообрабатывающий'
    ])->label('Тип цеха') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
