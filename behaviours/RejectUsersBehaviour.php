<?php
namespace app\behaviours;

use app\models\User;
use Yii;
use yii\base\Behavior;

class RejectUsersBehaviour extends Behavior
{
    private int $ROLE_USER = 1;
    private int $ROLE_MODERATOR = 2;
    private int $ROLE_EDITOR = 3;
    private int $ROLE_ADMIN = 4;

    public function rejectUser()
    {
        if (Yii::$app->user->isGuest || User::getCurrentUser()->role_id = $this->ROLE_USER)
            return Yii::$app->controller->redirect('/product/index');
    }
}