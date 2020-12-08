<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_rubric}}`.
 */
class m201208_073613_create_news_rubric_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news_rubric}}', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(),
            'rubric_id' => $this->integer()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news_rubric}}');
    }
}
