<?php

namespace app\controllers;

use app\models\Rubric;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class RubricController extends ActiveController
{

    public $modelClass = 'app\models\Rubric';


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
        return Rubric::find()
            ->with('news')
            ->where(['parent_id' => null])->all();
    }

    /**
     * @param $id
     * @return Rubric
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $rubric = Rubric::find()->where(['id' => $id])->one();

        if (!$rubric) {
            throw new NotFoundHttpException("Rubric not found id: $id");
        }


        return $rubric;
    }
}