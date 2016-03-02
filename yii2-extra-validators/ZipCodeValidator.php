<?php

namespace xyb\validators;
use Yii;
use yii\db\ActiveRecord;
use yii\validators\Validator;

/**
 * This is just an example.
 */
class ZipCodeValidator extends Validator
{
    public $pattern = '/^[0-9]\d{5}$/';

    public function init()
    {
        parent::init();
        if($this->message === null) {
            $this->message = '非法邮政编码';
        }
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if(!preg_match($this->pattern, $value)) {
            $this->addError($model, $attribute, $this->message);
        }
    }
}
