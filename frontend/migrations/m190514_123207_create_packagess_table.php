<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%packagess}}`.
 */
class m190514_123207_create_packagess_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%packagess}}', [
            'id' => $this->primaryKey(),
            'engine' => $this->string(1024),
            'max_ammo' => $this->integer(11),
            'signal_range' => $this->integer(11),
            'weight' => $this->integer(11),
            'shells' => $this->string(1024),
            'armor' => $this->string(1024),
            'hp' => $this->string(11),
            'gun' => $this->string(1024),
            'is_default' => $this->boolean(),
            'turret' => $this->string(2048),
            'hull_weight' => $this->integer(11),
            'speed_forward' => $this->integer(11),
            'hull_hp' => $this->integer(11),
            'speed_backward' => $this->integer(11),
            'suspension' => $this->string(1024),
            'max_weight' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%packagess}}');
    }
}
