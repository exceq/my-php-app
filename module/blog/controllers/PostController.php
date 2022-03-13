<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\module\blog\controllers;

use PostForm;
use yii\base\Controller;

/**
 * Description of PostController
 *
 * @author student
 */
class PostController extends Controller {
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionCreate()
    {
        $postForm = new PostForm();
        return $this->render('');
    }
    
    public function actionView()
    {
        return $this->render('index');
    }
    
    public function actionUpdate()
    {
        return $this->render('index');
    }
}
