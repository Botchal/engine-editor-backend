<?php

namespace app\modules\editor\controllers;

use app\modules\editor\models\MapObject;
use yii\rest\Controller;
use yii\rest\CreateAction;
use yii\rest\DeleteAction;
use yii\rest\IndexAction;
use yii\rest\UpdateAction;

class MapObjectController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'modelClass' => MapObject::class,
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => MapObject::class,
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => MapObject::class,
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'modelClass' => MapObject::class,
            ],
        ];
    }

}