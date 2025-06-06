<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_type".
 *
 * @property int $id_material_type
 * @property string $material_type
 * @property float $percentage_material_losses
 *
 * @property Products[] $products
 */
class MaterialType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['material_type', 'percentage_material_losses'], 'required', 'message' => 'Поле обязательно для заполнения'],

            ['material_type', 'string', 'max' => 255,
                'tooLong' => 'Название не должно превышать 255 символов'],

            ['material_type', 'match', 'pattern' => '/^[А-Яа-яЁё\w\s\-]+$/u',
                'message' => 'Допустимы только буквы, цифры, пробелы и дефисы'],

            ['percentage_material_losses', 'number',
                'min' => 0, 'max' => 100,
                'tooSmall' => 'Процент не может быть меньше 0',
                'tooBig' => 'Процент не может превышать 100'],

            ['percentage_material_losses', 'double',
                'message' => 'Введите десятичное число (например: 5.25)'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_material_type' => 'ID типа материала',
            'material_type' => 'тип материала',
            'percentage_material_losses' => 'Процент брака',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['material_type_id' => 'id_material_type']);
    }
}
