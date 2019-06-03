<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tanks".
 *
 * @property int $tank_id
 * @property string $name_en
 * @property string $name_ru
 * @property string $description_ru
 * @property string $description_en
 * @property int $is_premium
 * @property string $nation
 * @property string $next_tanks
 * @property int $price_credit
 * @property int $price_gold
 * @property string $prices_xp
 * @property string $short_name_en
 * @property string $short_name_ru
 * @property string $tag
 * @property int $tier
 * @property string $type
 * @property string $images
 * @property string $package
 */
class Tanks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tanks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_premium', 'price_credit', 'price_gold', 'tier'], 'integer'],
            [['name_en', 'name_ru', 'nation', 'short_name_en', 'short_name_ru'], 'string', 'max' => 128],
            [['description_ru', 'description_en', 'next_tanks', 'prices_xp'], 'string', 'max' => 2048],
            [['tag', 'type'], 'string', 'max' => 64],
            [['images'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tank_id' => Yii::t('common', 'Tank ID'),
            'name_en' => Yii::t('common', 'Name En'),
            'name_ru' => Yii::t('common', 'Name Ru'),
            'description_ru' => Yii::t('common', 'Description Ru'),
            'description_en' => Yii::t('common', 'Description En'),
            'is_premium' => Yii::t('common', 'Is Premium'),
            'nation' => Yii::t('common', 'Nation'),
            'next_tanks' => Yii::t('common', 'Next Tanks'),
            'price_credit' => Yii::t('common', 'Price Credit'),
            'price_gold' => Yii::t('common', 'Price Gold'),
            'prices_xp' => Yii::t('common', 'Prices Xp'),
            'short_name_en' => Yii::t('common', 'Short Name En'),
            'short_name_ru' => Yii::t('common', 'Short Name Ru'),
            'tag' => Yii::t('common', 'Tag'),
            'tier' => Yii::t('common', 'Tier'),
            'type' => Yii::t('common', 'Type'),
            'images' => Yii::t('common', 'Images'),
        ];
    }
}
