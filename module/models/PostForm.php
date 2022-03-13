<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\models\Post;

class PostForm extends \yii\base\Model
{
    public $body;
    public $head;
    public $dateCreate;
    public $status;    
    public $user;
    
    public function rules()
    {
        return [
            [['author'],'safe'],
            [['body', 'head'], 'required', 'string'],
            [['status'], 'range', 'in' => [Post::STATUS_MOD, Post::STATUS_PUB, Post::STATUS_UNPUB]],
        ];
    }
    
    public function save($param) {
        return $this->createPost();
    }

    public function publish($param) {
        $this->user->publish($this->createPost());
    }
    
    public function unPublish($param) {
        $this->user->unPublish($this->createPost());
    }
    
    private function createPost() {
        return new Post($this->body, $this->head, $this->dateCreate, $this->user, $this->status);
    }
}
