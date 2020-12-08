<?php

namespace app\models;

use app\models\query\NewsRubricQuery;
use app\models\query\RubricQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "rubric".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 *
 * @property Rubric $parent
 * @property Rubric[] $rubrics
 * @property NewsRubric[] $newsRubrics
 */
class Rubric extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'rubric';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => self::class, 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
        ];
    }

    public function fields(): array
    {
        return parent::fields() + ['news', 'rubrics'];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return ActiveQuery|RubricQuery
     */
    public function getParent()
    {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[rubrics]].
     *
     * @return ActiveQuery|RubricQuery
     */
    public function getRubrics()
    {
        return $this->hasMany(self::class, ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[NewsRubrics]].
     *
     * @return ActiveQuery|NewsRubricQuery
     */
    public function getNewsRubrics()
    {
        return $this->hasMany(NewsRubric::class, ['rubric_id' => 'id']);
    }

    /**
     * Gets query for [[NewsRubrics]].
     *
     * @return ActiveQuery|NewsRubricQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])
            ->via('newsRubrics');
    }

    /**
     * {@inheritdoc}
     * @return RubricQuery the active query used by this AR class.
     */
    public static function find(): RubricQuery
    {
        return new RubricQuery(get_called_class());
    }

}
