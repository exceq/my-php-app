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
            // username and password are both required
            [['text', 'mark'], 'required'],
        ];
    }
}