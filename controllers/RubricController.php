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

        unset($actions['index'], $actions['view'], $actions['update'], $actions['delete']);

        return $actions;
    }

    public function actionIndex(): array
    {
        return Rubric::find()
            ->with('news')
            ->where(['parent_id' => null])->all();
    }

    public function actionView($id)
    {
//        return Rubric::find()->with('newsRubrics')->where(['parent_id' => null])->all();
    }
}