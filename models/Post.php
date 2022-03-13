<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models; 

use yii\base\Model;

class Post extends Model
{
    const STATUS_MOD=1;
    const STATUS_PUB=2;
    const STATUS_UNPUB=3;
    
    public $body;
    public $head;
    public $dateCreate;
    public $author;
    public $status;
    
    public function rules()
    {
        return [
            [['author'],'safe'],
            [['body', 'head'], 'required', 'string'],
            [['status'], 'range', 'in' => [self::STATUS_MOD, self::STATUS_PUB, self::STATUS_UNPUB]],
        ];
    }
}

