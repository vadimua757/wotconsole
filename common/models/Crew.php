<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "crew".
 *
 * @property int $id
 * @property string $name_en
 * @property string $name_ru
 * @property string $description_ru
 * @property string $description_en
 * @property int $is_perk
 * @property string $skill_name
 * @property string $images
 * @property string $short_name
 */
class Crew extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crew';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_perk'], 'integer'],
            [['name_en', 'name_ru', 'skill_name', 'short_name'], 'string', 'max' => 128],
            [['description_ru', 'description_en'], 'string', 'max' => 2048],
            [['images'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name_en' => Yii::t('common', 'Name En'),
            'name_ru' => Yii::t('common', 'Name Ru'),
            'description_ru' => Yii::t('common', 'Description Ru'),
            'description_en' => Yii::t('common', 'Description En'),
            'is_perk' => Yii::t('common', 'Is Perk'),
            'skill_name' => Yii::t('common', 'Skill Name'),
            'images' => Yii::t('common', 'Images'),
            'short_name' => Yii::t('common', 'Short Name'),
        ];
    }
}
