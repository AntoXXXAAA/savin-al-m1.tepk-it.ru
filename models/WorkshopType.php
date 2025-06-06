<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workshop_type".
 *
 * @property int $id_workshop_type
 * @property string $workshop_type
 *
 * @property Workshops[] $workshops
 */
class WorkshopType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workshop_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['workshop_type', 'required',
                'message' => 'Поле обязательно для заполнения'],

            ['workshop_type', 'string', 'max' => 255,
                'tooLong' => 'Название не должно превышать 255 символов'],

            ['workshop_type', 'match', 'pattern' => '/^[А-Яа-яЁё\w\s\-]+$/u',
                'message' => 'Допустимы только буквы, цифры, пробелы и дефисы'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_workshop_type' => 'ID типа цеха',
            'workshop_type' => 'Тип цеха',
        ];
    }

    /**
     * Gets query for [[Workshops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshops()
    {
        return $this->hasMany(Workshops::class, ['workshop_type_id' => 'id_workshop_type']);
    }
}
