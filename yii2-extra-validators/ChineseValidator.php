<?php

namespace xyb\validators;
use Yii;
use yii\db\ActiveRecord;
use yii\validators\Validator;

/**
 * This is just an example.
 */
class ChineseValidator extends Validator
{
    public $pattern = '/^[\x{4e00}-\x{9fa5}]+$/u';

    public function init()
    {
        parent::init();
        if($this->message === null) {
            $this->message = '非法中文字符';
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
