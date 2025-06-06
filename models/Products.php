<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id_products
 * @property int $product_type_id
 * @property string $products_name
 * @property int $article
 * @property float $min_price_partner
 * @property int $material_type_id
 *
 * @property MaterialType $materialType
 * @property ProductType $productType
 * @property ProductWorkshops[] $productWorkshops
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_type_id', 'material_type_id', 'products_name', 'article', 'min_price_partner'], 'required',
                'message' => 'Поле обязательно для заполнения'],

            ['products_name', 'string', 'max' => 255,
                'tooLong' => 'Название не должно превышать 255 символов'],

            ['products_name', 'match', 'pattern' => '/^[А-Яа-яЁё\w\s\-]+$/u',
                'message' => 'Допустимы только буквы, цифры, пробелы и дефисы'],

            ['article', 'integer', 'min' => 1,
                'message' => 'Артикул должен быть целым числом',
                'tooSmall' => 'Артикул не может быть меньше 1'],

            ['min_price_partner', 'number', 'min' => 0.01,
                'message' => 'Введите корректную цену',
                'tooSmall' => 'Цена не может быть меньше 0.01'],

            [['product_type_id', 'material_type_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => ProductType::class,
                'targetAttribute' => ['product_type_id' => 'id_product_type'],
                'message' => 'Указанный тип товара не существует'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_products' => 'ID продукта',
            'product_type_id' => 'Тип продукта',
            'products_name' => 'Название',
            'article' => 'Артикул',
            'min_price_partner' => 'Минимальная цена для партнёра',
            'material_type_id' => 'Материал',
        ];
    }

    /**
     * Gets query for [[MaterialType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialType()
    {
        return $this->hasOne(MaterialType::class, ['id_material_type' => 'material_type_id']);
    }

    /**
     * Gets query for [[ProductType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductType()
    {
        return $this->hasOne(ProductType::class, ['id_product_type' => 'product_type_id']);
    }

    /**
     * Gets query for [[ProductWorkshops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductWorkshops()
    {
        return $this->hasMany(ProductWorkshops::class, ['product_id' => 'id_products']);
    }

    /**
     * Возвращает общее время изготовления продукта (сумма времени по всем цехам)
     * Результат приводится к целому неотрицательному числу (int).
     *
     * @return int
     */
    public function getTotalManufacturingTime(): int
    {
        $totalTime = 0;

        // $this->productWorkshops — связь hasMany, генерируемая Gii
        foreach ($this->productWorkshops as $pw) {
            // $pw->manufacturing_time — decimal, например «4.20»
            $totalTime += (float)$pw->manufacturing_time;
        }

        // Приводим к int (отброс дробной части)
        return (int)$totalTime;
    }
}
