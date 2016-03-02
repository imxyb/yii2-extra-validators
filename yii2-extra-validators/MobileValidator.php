<?php

namespace xyb\validators;
use Yii;
use yii\db\ActiveRecord;
use yii\validators\Validator;

/**
 * This is just an example.
 */
class MobileValidator extends Validator
{
    public $pattern = '/^0?(13|15|18|14|17)[0-9]{9}$/';

    public function init()
    {
        parent::init();
        if($this->message === null) {
            $this->message = '手机号码格式不正确';
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
