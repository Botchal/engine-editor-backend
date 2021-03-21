<?php

namespace app\validators;

use yii\validators\Validator;

class Vector3Validator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if (!is_array($attribute)) {
            $this->addError($model, $attribute, 'Не массив');
        }

        if ($attribute['x'] ?? null) {
            $this->addError($model, $attribute, 'Отсутствует координата X');
        }
        if ($attribute['y'] ?? null) {
            $this->addError($model, $attribute, 'Отсутствует координата Y');
        }
        if ($attribute['z'] ?? null) {
            $this->addError($model, $attribute, 'Отсутствует координата Z');
        }

        if (!is_float($attribute['x'] ?? null)) {
            $this->addError($model, $attribute, 'Координата X не float');
        }
        if (!is_float($attribute['y'] ?? null)) {
            $this->addError($model, $attribute, 'Координата Y не float');
        }
        if (!is_float($attribute['z'] ?? null)) {
            $this->addError($model, $attribute, 'Координата Z не float');
        }
    }
}