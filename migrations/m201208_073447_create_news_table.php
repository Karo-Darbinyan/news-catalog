<?php

use Faker\Factory;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m201208_073447_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->notNull()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');


        $rows = [];
        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $rows[] = [
                'title' => $faker->text(30),
                'body' => $faker->text
            ];
        }

        $this->batchInsert('{{%news}}', ['title', 'body'], $rows);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
