<?php

namespace app\controllers;

use app\models\News;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class NewsController extends ActiveController
{
    public $modelClass = 'app\models\News';

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formatParam' => 'format',
                'formats' => [
                    'json' => Response::FORMAT_JSON,
                ],
            ]
        ];
    }

    public function actions(): array
    {
        $actions = parent::actions();

        unset($actions['index'], $actions['view'], $actions['create'], $actions['update'], $actions['delete']);

        return $actions;
    }


    /**
     * @return array
     */
    public function actionIndex(): array
    {
        return News::find()->with('rubrics')->asArray()->all();
    }


    /**
     * @param $id
     * @return News
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $news = News::find()->with('rubrics')->where(['id' => $id])->asArray()->one();

        if (!$news) throw new NotFoundHttpException("Rubric not found id: $id");

        return $news;
    }
}