<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tanks}}`.
 */
class m190510_145958_create_tanks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tanks}}', [
            'tank_id' => $this->primaryKey(),
            'name_en' => $this->string(128),
            'name_ru' => $this->string(128),
            'description_ru' => $this->string(2048),
            'description_en' => $this->string(2048),
            'is_premium' => $this->boolean(),
            'nation' => $this->string(128),
            'next_tanks' => $this->string(2048),
            'price_credit' => $this->integer(),
            'price_gold' => $this->integer(),
            'prices_xp' => $this->string(2048),
            'short_name_en' => $this->string(128),
            'short_name_ru' => $this->string(128),
            'tag' => $this->string(64),
            'tier' => $this->integer(),
            'type' => $this->string(64),
            'images' => $this->string(1024),
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tanks}}');
    }
}
