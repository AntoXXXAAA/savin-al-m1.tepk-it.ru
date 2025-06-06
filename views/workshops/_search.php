<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\WorkshopsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="workshops-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_workshops') ?>

    <?= $form->field($model, 'workshop_name') ?>

    <?= $form->field($model, 'workshop_type_id') ?>

    <?= $form->field($model, 'count_people') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
