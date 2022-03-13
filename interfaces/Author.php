<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\interfaces;

use app\models\Post;

interface Author {
    function create(Post $post);
    function update(Post $post);
    function getName();
}
