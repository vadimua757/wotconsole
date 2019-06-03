<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "packagess".
 *
 * @property int $id
 * @property string $engine
 * @property int $max_ammo
 * @property int $signal_range
 * @property int $weight
 * @property string $shells
 * @property string $armor
 * @property string $hp
 * @property string $gun
 * @property int $is_default
 * @property string $turret
 * @property int $hull_weight
 * @property int $speed_forward
 * @property int $hull_hp
 * @property int $speed_backward
 * @property string $suspension
 * @property int $max_weight
 */
class Packagess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packagess';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['max_ammo', 'signal_range', 'weight', 'is_default', 'hull_weight', 'speed_forward', 'hull_hp', 'speed_backward', 'max_weight'], 'integer'],
            [['engine', 'shells', 'armor', 'gun', 'suspension'], 'string', 'max' => 1024],
            [['hp'], 'string', 'max' => 11],
            [['turret'], 'string', 'max' => 2048],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'engine' => Yii::t('common', 'Engine'),
            'max_ammo' => Yii::t('common', 'Max Ammo'),
            'signal_range' => Yii::t('common', 'Signal Range'),
            'weight' => Yii::t('common', 'Weight'),
            'shells' => Yii::t('common', 'Shells'),
            'armor' => Yii::t('common', 'Armor'),
            'hp' => Yii::t('common', 'Hp'),
            'gun' => Yii::t('common', 'Gun'),
            'is_default' => Yii::t('common', 'Is Default'),
            'turret' => Yii::t('common', 'Turret'),
            'hull_weight' => Yii::t('common', 'Hull Weight'),
            'speed_forward' => Yii::t('common', 'Speed Forward'),
            'hull_hp' => Yii::t('common', 'Hull Hp'),
            'speed_backward' => Yii::t('common', 'Speed Backward'),
            'suspension' => Yii::t('common', 'Suspension'),
            'max_weight' => Yii::t('common', 'Max Weight'),
        ];
    }
}
