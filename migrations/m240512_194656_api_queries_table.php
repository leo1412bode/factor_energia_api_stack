<?php

use yii\db\Migration;

/**
 * Class m240512_194656_api_queries_table
 */
class m240512_194656_api_queries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%api_queries}}', [
            'id' => $this->primaryKey(),
            'tagged' => $this->string()->notNull(),
            'todate' => $this->string(),
            'fromdate' => $this->string(),
            'result' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%api_queries}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240512_194656_api_queries_table cannot be reverted.\n";

        return false;
    }
    */
}
