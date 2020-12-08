<?php

use yii\db\Migration;

/**
 * Class m201208_074535_add_foreign_keys
 */
class m201208_074535_add_foreign_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-news_rubric-news_id',
            'news_rubric',
            'news_id',
            'news',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-news_rubric-rubric_id',
            'news_rubric',
            'rubric_id',
            'rubric',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-rubric-parent_id',
            'rubric',
            'parent_id',
            'rubric',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-news_rubric-news_id', 'news_rubric');
        $this->dropForeignKey('fk-news_rubric-rubric_id', 'news_rubric');
        $this->dropForeignKey('fk-rubric-parent_id', 'rubric');
    }

}
