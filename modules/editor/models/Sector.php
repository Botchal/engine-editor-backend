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
        return $this->hasMany(MapObject::class, ['_sector_id' => '_id']);
    }
}