<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_workshops".
 *
 * @property int $id_product_workshops
 * @property int $product_id
 * @property int $workshops_id
 * @property float $manufacturing_time
 *
 * @property Products $product
 * @property Workshops $workshops
 */
class ProductWorkshops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_workshops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'workshops_id', 'manufacturing_time'], 'required',
                'message' => 'Поле обязательно для заполнения'],

            ['manufacturing_time', 'number', 'min' => 0.0001,
                'message' => 'Введите корректное время производства',
                'tooSmall' => 'Время не может быть меньше 0.0001'],

            [['product_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => Products::class,
                'targetAttribute' => ['product_id' => 'id_products'],
                'message' => 'Указанный товар не существует'],

            [['workshops_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => Workshops::class,
                'targetAttribute' => ['workshops_id' => 'id_workshops'],
                'message' => 'Указанный цех не существует'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product_workshops' => 'ID производства цеха',
            'product_id' => 'Продукт',
            'workshops_id' => 'Цех',
            'manufacturing_time' => 'Время производства',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::class, ['id_products' => 'product_id']);
    }

    /**
     * Gets query for [[Workshops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshops()
    {
        return $this->hasOne(Workshops::class, ['id_workshops' => 'workshops_id']);
    }
}
