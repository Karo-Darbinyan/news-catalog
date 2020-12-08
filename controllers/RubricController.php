<?php

namespace app\controllers;

use app\models\Rubric;
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
        return Rubric::find()->where(['parent_id' => null])->all();
    }
}