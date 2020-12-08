<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rubric}}`.
 */
class m201208_073447_create_rubric_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rubric}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'parent_id' => $this->integer()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rubric}}');
    }
}
