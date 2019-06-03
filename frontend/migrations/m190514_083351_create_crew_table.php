<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%crew}}`.
 */
class m190514_083351_create_crew_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%crew}}', [
            'id' => $this->primaryKey(),
            'name_en' => $this->string(128),
            'name_ru' => $this->string(128),
            'description_ru' => $this->string(2048),
            'description_en' => $this->string(2048),
            'is_perk' => $this->boolean(),
            'skill_name' => $this->string(128),
            'images' => $this->string(1024),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%crew}}');
    }
}
