<?php

namespace app\models;

use app\models\query\NewsQuery;
use app\models\query\NewsRubricQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 *
 * @property NewsRubric[] $newsRubrics
 */
class News extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
        ];
    }

    /**
     * Gets query for [[NewsRubrics]].
     *
     * @return ActiveQuery|NewsRubricQuery
     */
    public function getNewsRubrics()
    {
        return $this->hasMany(NewsRubric::class, ['news_id' => 'id']);
    }

    /**
     * Gets query for [[NewsRubrics]].
     *
     * @return ActiveQuery|NewsRubricQuery
     */
    public function getRubrics()
    {
        return $this->hasMany(Rubric::class, ['id' =>'rubric_id'])
            ->via('newsRubrics')
            ;
    }

    /**
     * {@inheritdoc}
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find(): NewsQuery
    {
        return new NewsQuery(get_called_class());
    }
}
