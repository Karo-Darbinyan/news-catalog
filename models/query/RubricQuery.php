<?php

namespace app\models\query;

use app\models\Rubric;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\Rubric]].
 *
 * @see \app\models\Rubric
 */
class RubricQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Rubric[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Rubric|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
