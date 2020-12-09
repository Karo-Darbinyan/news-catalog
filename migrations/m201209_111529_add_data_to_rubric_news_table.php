<?php

use app\models\News;
use app\models\NewsRubric;
use app\models\Rubric;
use yii\db\Migration;

/**
 * Class m201209_111529_add_data_to_rubric_news_table
 */
class m201209_111529_add_data_to_rubric_news_table extends Migration
{

    private $rubricTable = '{{%rubric}}';
    private $newsTable = '{{%news}}';


    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $rubrics = Rubric::find()->select('id')->column();
        $news = News::find()->select('id')->column();

        for ($i = 0; $i < 100; $i++) {
            $rubric_id = array_rand($rubrics);
            $news_id = array_rand($news);
            if (!NewsRubric::find()->where(['news_id' => $news_id, 'rubric_id' => $rubric_id])->exists()) {
                $news_rubric = new NewsRubric();
                $news_rubric->rubric_id = $rubric_id;
                $news_rubric->news_id = $news_id;
                $news_rubric->save();
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        NewsRubric::deleteAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_111529_add_data_to_rubric_news_table cannot be reverted.\n";

        return false;
    }
    */
}
