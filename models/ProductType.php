<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_type".
 *
 * @property int $id_product_type
 * @property string $product_type
 * @property float $product_type_coefficient
 *
 * @property Products[] $products
 */
class ProductType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_type', 'product_type_coefficient'], 'required',
                'message' => 'Поле обязательно для заполнения'],

            ['product_type', 'string', 'max' => 255,
                'tooLong' => 'Название не должно превышать 255 символов'],

            ['product_type', 'match', 'pattern' => '/^[А-Яа-яЁё\w\s\-]+$/u',
                'message' => 'Допустимы только буквы, цифры, пробелы и дефисы'],

            ['product_type_coefficient', 'number', 'min' => 0.0001,
                'message' => 'Введите корректный коэффициент',
                'tooSmall' => 'Коэффициент не может быть меньше 0.0001'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product_type' => 'ID типа продукта',
            'product_type' => 'тип продукта',
            'product_type_coefficient' => 'Коэффициент типа продукта',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['product_type_id' => 'id_product_type']);
    }
}
