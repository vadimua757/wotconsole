<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "package".
 *
 * @property int $id
 * @property int $default_package_id
 * @property int $packages_id
 * @property int $packages_tree_id
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['default_package_id', 'packages_id', 'packages_tree_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'default_package_id' => Yii::t('common', 'Default Package ID'),
            'packages_id' => Yii::t('common', 'Packages ID'),
            'packages_tree_id' => Yii::t('common', 'Packages Tree ID'),
        ];
    }

//    public function getPackages
}
