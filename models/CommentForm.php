<?php

namespace app\models;

use yii\base\Model;

class CommentForm extends Model
{

    public $mark;
    public $text;

    public function rules()
    {
        return [
            [['text', 'mark'], 'required'],
            [['mark'], 'integer', 'min' => 1, 'max' => 5, 'message' => 'Неверный диапазон'],
        ];
    }
}