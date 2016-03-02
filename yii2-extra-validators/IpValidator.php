<?php

namespace xyb\validators;
use Yii;
use yii\db\ActiveRecord;
use yii\validators\Validator;

/**
 * This is just an example.
 */
class IpValidator extends Validator
{
    public $pattern = '/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/';

    public function init()
    {
        parent::init();
        if($this->message === null) {
            $this->message = 'IP格式不正确';
        }
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if(!filter_var($value, FILTER_VALIDATE_IP)) {
            $this->addError($model, $attribute, $this->message);
        }
    }
}
