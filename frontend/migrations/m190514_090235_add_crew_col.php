<?php

use yii\db\Migration;

/**
 * Class m190514_090235_add_crew_col
 */
class m190514_090235_add_crew_col extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%crew}}', 'short_name','string(128)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%crew}}','short_name');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_090235_add_crew_col cannot be reverted.\n";

        return false;
    }
    */
}
