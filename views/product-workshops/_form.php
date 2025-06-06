<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshops $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-workshops-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Products::find()->all(), 'id_products', 'products_name'),
        ['prompt' => 'Выберите товар', 'required' => true]
    )->label('Товар') ?>

    <?= $form->field($model, 'workshops_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Workshops::find()->all(), 'id_workshops', 'workshop_name'),
        ['prompt' => 'Выберите цех', 'required' => true]
    )->label('Цех') ?>

    <?= $form->field($model, 'manufacturing_time')->textInput([
        'type' => 'number',
        'min' => 0.0001,
        'max' => 999999.9999,
        'step' => 0.0001,
        'required' => true,
        'title' => 'Допустимые значения: 0.0001-999999.9999',
        'placeholder' => 'Например: 10.5000'
    ])->label('Время производства (часы)') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
