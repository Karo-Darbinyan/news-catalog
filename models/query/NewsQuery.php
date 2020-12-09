<?php

namespace app\models\query;

use app\models\News;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\News]].
 *
 * @see \app\models\News
 */
class NewsQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return News[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return News|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
