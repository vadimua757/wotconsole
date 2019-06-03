<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%packages_tree}}`.
 */
class m190514_123218_create_packages_tree_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%packages_tree}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'next_packages' => $this->string(128),
            'next_tanks' => $this->string(128),
            'price_xp' => $this->string(128),
            'price_credit' => $this->string(128),
            'type' => $this->string(128),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%packages_tree}}');
    }
}
