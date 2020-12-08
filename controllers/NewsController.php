<?php

namespace app\controllers;

use app\models\News;
use yii\rest\ActiveController;

class NewsController extends ActiveController
{
    public $modelClass = 'app\models\News';

    public function actions(): array
    {
        $actions = parent::actions();

        unset($actions['index'], $actions['view'], $actions['update'], $actions['delete']);

        return $actions;
    }

    public function actionIndex(): array
    {
        return News::find()->all();
    }

    public function actionView($id)
    {
        return News::find()->with('rubrics')->where(['id' => $id])->asArray()->one();
    }
}