<?php

namespace app\models\query;

use app\models\NewsRubric;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\NewsRubric]].
 *
 * @see \app\models\NewsRubric
 */
class NewsRubricQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NewsRubric[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NewsRubric|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
