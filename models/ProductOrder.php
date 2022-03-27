<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_order".
 *
 * @property int $order_id
 * @property int $product_id
 * @property string $date
 *
 * @property Product $order
 * @property Order $order0
 */
class ProductOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'date'], 'required'],
            [['order_id', 'product_id'], 'integer'],
            [['date'], 'safe'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Product::className(), ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Order0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder0()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
