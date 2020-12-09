<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rubric}}`.
 */
class m201208_072952_create_rubric_table extends Migration
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
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');


        $rows = [
            ['name' => 'Общество', 'parent_id' => null],
            ['name' => 'День города', 'parent_id' => null],
            ['name' => '0-3 года', 'parent_id' => null],
            ['name' => '3-7 года', 'parent_id' => null],
            ['name' => 'Спорт', 'parent_id' => null],
            ['name' => 'городская жизнь', 'parent_id' => 1],
            ['name' => 'выборы', 'parent_id' => 1],
            ['name' => 'салюты', 'parent_id' => 2],
            ['name' => 'детская', 'parent_id' => 2]
        ];

        $this->batchInsert('{{%rubric}}', ['name', 'parent_id'],$rows);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rubric}}');
    }
}
