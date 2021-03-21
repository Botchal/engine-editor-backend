<?php

namespace app\modules\editor\models;

use app\validators\Vector3Validator;
use yii\mongodb\ActiveRecord;

/**
 * Мета объект на карте
 *
 * @property  string $_id
 * @property integer $sector_number
 * @property array $translation
 * @property array $rotation
 * @property array $scale
 * @property string $reference
 *
 * @property-read Sector $sector
 */
class MapObject extends ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->db;
    }

    public static function collectionName()
    {
        return 'map_objects';
    }

    public function attributes()
    {
        return [
            '_id',
            'sector_number',
            'translation',
            'rotation',
            'scale',
            'reference'
        ];
    }

    public function rules()
    {
        return [
            [['_id', 'reference'], 'string'],
            [['sector_number'], 'integer'],
            [['sector_number'], 'exist', 'targetRelation' => 'sector'],
            [['translation', 'rotation', 'scale'], Vector3Validator::class],
            [['translation', 'rotation', 'scale'], Vector3Validator::class],
        ];
    }

    /**
     * @return \yii\db\ActiveQueryInterface
     */
    public function getSector()
    {
        return $this->hasOne(Sector::class, ['number' => 'sector_number']);
    }
}