<?php

namespace app\modules\editor\models;

use app\validators\Vector3Validator;
use yii\mongodb\ActiveRecord;

/**
 * Мета объект на карте
 *
 * @property  string $_id
 * @property string $_sector_id
 * @property array $translation
 * @property array $rotation
 * @property array $scale
 * @property string $reference
 *
 * @property-read Sector $sector
 */
class MapObject extends ActiveRecord
{
    public function attributes()
    {
        return [
            '_id',
            '_sector_id',
            'translation',
            'rotation',
            'scale',
            'reference'
        ];


    }

    public function rules()
    {
        return [
            [['_id', '_sector_id', 'reference'], 'string'],
            [['_sector_id'], 'exist', 'targetClass' => Sector::class, 'targetAttribute' => '_id'],
            [['translation', 'rotation', 'scale'], Vector3Validator::class],
        ];
    }

    /**
     * @return \yii\db\ActiveQueryInterface
     */
    public function getSector()
    {
        return $this->hasOne(Sector::class, ['_id' => '_sector_id']);
    }
}