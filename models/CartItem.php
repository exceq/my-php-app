<?php

namespace app\models;

use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "cart_item".
 *
 * @property int $user_id
 * @property int $product_id
 * @property int|null $count
 *
 * @property Product $product
 * @property User $user
 */
class CartItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id'], 'required'],
            [['user_id', 'product_id', 'count'], 'integer'],
            [['user_id', 'product_id'], 'unique', 'targetAttribute' => ['user_id', 'product_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'count' => 'Count',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Method sets $user_id and $product_id to model and Saves.
     *
     * Returns True if CartItem saved successfully.
     * @param $user_id
     * @param $product_id
     * @return bool
     */
    public function loadDataAndSave($user_id, $product_id): bool
    {
        $cartItem = CartItem::findOne(['user_id' => $user_id, 'product_id' => $product_id]);
        if ($cartItem){
            $cartItem->count++;
            return $cartItem->save();
        } else {
            $this->user_id = $user_id;
            $this->product_id = $product_id;
            $this->count = 1;
            return $this->save();
        }
    }

    /**
     * Finds all CartItem models of User based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $user_id User ID
     * @return CartItem[] the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public static function findAllCartItemsOfUser(int $user_id): array
    {
        if (($model = CartItem::findAll(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
