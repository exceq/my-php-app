<?php

namespace app\widgets\productList;
use app\models\CartItem;
use yii\base\Widget;


/**
 * Pretty List of Products for pages Cart and Order
 */
class CartItemList extends Widget
{
    /**
     * @var CartItem[] - the items to display.
     */
    public array $model;

    public function run()
    {
        return $this->render('cartItems', [
            'model' => $this->model,
        ]);
    }

}