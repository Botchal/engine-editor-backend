<?php


namespace app\commands;


use app\modules\editor\models\Sector;
use yii\console\Controller;

class SectorsController extends Controller
{
    public function actionInit()
    {
        for($i = 0; $i < 256; $i++) {
            $sector = new Sector();
            $sector->number = $i+1;
            $sector->save();
        }
    }
}