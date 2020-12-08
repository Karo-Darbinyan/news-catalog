<?php

namespace app\models;

use app\models\query\NewsQuery;
use app\models\query\NewsRubricQuery;
use app\models\query\RubricQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news_rubric".
 *
 * @property int $id
 * @property int|null $news_id
 * @property int|null $rubric_id
 *
 * @property Rubric $rubric
 * @property News $news
 */
class NewsRubric extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'news_rubric';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['news_id', 'rubric_id'], 'integer'],
            [['rubric_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rubric::class, 'targetAttribute' => ['rubric_id' => 'id']],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::class, 'targetAttribute' => ['news_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'news_id' => 'News ID',
            'rubric_id' => 'rubric ID',
        ];
    }

    /**
     * Gets query for [[rubric]].
     *
     * @return ActiveQuery|RubricQuery
     */
    public function getRubric()
    {
        return $this->hasOne(Rubric::class, ['id' => 'rubric_id']);
    }

    /**
     * Gets query for [[News]].
     *
     * @return ActiveQuery|NewsQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::class, ['id' => 'news_id']);
    }

    /**
     * {@inheritdoc}
     * @return NewsRubricQuery the active query used by this AR class.
     */
    public static function find(): NewsRubricQuery
    {
        return new NewsRubricQuery(get_called_class());
    }
}
