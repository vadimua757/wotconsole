<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%package}}`.
 */
class m190514_121117_create_packages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%package}}', [
            'id' => $this->primaryKey(),
            'default_package_id' => $this->integer(11),
            'packages_id' => $this->string(128),
            'packages_tree_id' => $this->string(128),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%package}}');
    }
}
