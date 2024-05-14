<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%api_queries}}`.
 */
class m240513_212728_add_created_at_column_to_api_queries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%api_queries}}', 'created_at', $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%api_queries}}', 'created_at');
    }
}
