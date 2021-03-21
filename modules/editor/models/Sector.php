<?php

namespace app\modules\editor\models;

use yii\mongodb\ActiveRecord;

/**
 * Сектор карты
 *
 * @property string $_id
 * @property integer $number
 *
 * @property-read MapObject[] $mapObjects
 */
class Sector extends ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->db;
    }

    public static function collectionName()
    {
        return 'sectors';
    }

    public function attributes()
    {
        return [
            '_id',
            'number',
        ];


    }

    public function rules()
    {
        return [
            [['_id'], 'string'],
            [['number'], 'integer'],
        ];
    }

    /**
     * @return \yii\db\ActiveQueryInterface
     */
    public function getMapObjects()
    {
        return $this->hasMany(MapObject::class, ['sector_number' => 'number']);
    }
}