<?php

namespace app\controllers;

use app\models\rubric;
use yii\rest\ActiveController;

class RubricController extends ActiveController
{
    public $modelClass = 'app\models\Rubric';

    public function actions(): array
    {
        $actions = parent::actions();

        unset($actions['index'], $actions['create']);

        return $actions;
    }

    public function actionIndex(): array
    {
        return rubric::find()->where(['parent_id' => null])->all();
    }
}