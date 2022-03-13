<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\interfaces;

use app\models\Post;

interface Moderator {
    function publish(Post $post);
    function unPublish(Post $post);
}
