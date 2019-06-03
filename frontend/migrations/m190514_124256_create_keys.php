<?php

use yii\db\Migration;

/**
 * Class m190514_124256_create_keys
 */
class m190514_124256_create_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_packages', '{{%packagess}}', 'id', '{{%package}}', 'packages_id', 'cascade', 'cascade');
        $this->addForeignKey('fk_packages', '{{%packages_tree}}', 'id', '{{%packages_tree}}', 'packages_tree_id', 'cascade', 'cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_packages', '{{%packagess}}');
        $this->dropForeignKey('fk_packages_tree', '{{%packages_tree}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_124256_create_keys cannot be reverted.\n";

        return false;
    }
    */
}
