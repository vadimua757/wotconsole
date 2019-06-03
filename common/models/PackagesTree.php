<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "packages_tree".
 *
 * @property int $id
 * @property string $name
 * @property string $next_packages
 * @property string $next_tanks
 * @property string $price_xp
 * @property string $price_credit
 * @property string $type
 */
class PackagesTree extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packages_tree';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 64],
            [['next_packages', 'next_tanks', 'price_xp', 'price_credit', 'type'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'next_packages' => Yii::t('common', 'Next Packages'),
            'next_tanks' => Yii::t('common', 'Next Tanks'),
            'price_xp' => Yii::t('common', 'Price Xp'),
            'price_credit' => Yii::t('common', 'Price Credit'),
            'type' => Yii::t('common', 'Type'),
        ];
    }
}
