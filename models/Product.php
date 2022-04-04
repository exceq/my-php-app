<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property float $price
 * @property int $active
 * @property int|null $category_id
 *
 * @property Category $category
 * @property Comment[] $comments
 * @property ProductImage[] $productImages
 * @property ProductOrder[] $productOrders
 * @property Order[] $Orders
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'active'], 'required'],
            [['price'], 'number'],
            [['active', 'category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1000],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'description' => 'Описание',
            'price' => 'Цена',
            'active' => 'Активно',
            'category_id' => 'Категория',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductOrders()
    {
        return $this->hasMany(ProductOrder::className(), ['order_id' => 'id']);
    }
    public function getOrders() {
        return $this->hasMany(Order::className(), ['id' => 'order_id'])
            ->viaTable('product_order', ['product_id' => 'id']);
    }

    public function getMeanMark()
    {
        $map = ArrayHelper::getColumn($this->comments, 'mark');
        return count($map) ? array_sum($map) / floatval(count($map)) : 0;
    }

    public function getBreadcrumbs()
    {

    }
}
