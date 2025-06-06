<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workshops".
 *
 * @property int $id_workshops
 * @property string $workshop_name
 * @property int $workshop_type_id
 * @property int $count_people
 *
 * @property ProductWorkshops[] $productWorkshops
 * @property WorkshopType $workshopType
 */
class Workshops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workshops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['workshop_name', 'workshop_type_id', 'count_people'], 'required',
                'message' => 'Поле обязательно для заполнения'],

            ['workshop_name', 'string', 'max' => 255,
                'tooLong' => 'Название не должно превышать 255 символов'],

            ['workshop_name', 'match', 'pattern' => '/^[А-Яа-яЁё\w\s\-]+$/u',
                'message' => 'Допустимы только буквы, цифры, пробелы и дефисы'],

            ['count_people', 'integer', 'min' => 1,
                'message' => 'Введите целое число',
                'tooSmall' => 'Количество не может быть меньше 1'],

            [['workshop_type_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => WorkshopType::class,
                'targetAttribute' => ['workshop_type_id' => 'id_workshop_type'],
                'message' => 'Указанный тип цеха не существует'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_workshops' => 'ID цеха',
            'workshop_name' => 'Название',
            'workshop_type_id' => 'Тип цеха',
            'count_people' => 'Количество работников',
        ];
    }

    /**
     * Gets query for [[ProductWorkshops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductWorkshops()
    {
        return $this->hasMany(ProductWorkshops::class, ['workshops_id' => 'id_workshops']);
    }

    /**
     * Gets query for [[WorkshopType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshopType()
    {
        return $this->hasOne(WorkshopType::class, ['id_workshop_type' => 'workshop_type_id']);
    }
}
