<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $transliterated_name
 * @property string|null $name
 * @property int|null $parent_category_id
 *
 * @property Category[] $categories
 * @property Category $parentCategory
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transliterated_name'], 'required'],
            [['parent_category_id'], 'integer'],
            [['transliterated_name', 'name'], 'string', 'max' => 255],
            [['parent_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transliterated_name' => 'Transliterated Name',
            'name' => 'Name',
            'parent_category_id' => 'Parent Category ID',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_category_id' => 'id']);
    }

    /**
     * Gets query for [[ParentCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_category_id']);
    }

    public static function getAllCategoriesString()
    {
        //TODO сделать что-то с этим уродством
        foreach (Category::find()->all() as $cat) {
            $id = $cat->id;
            $categories = array_map(function ($c) { return $c->name;}, $cat->getAllCategories());
            $result = join(" → ", $categories);
            $res[$id] = $result;
        }
        return $res;
//        return Category::find()->asArray()->all();
//        return ArrayHelper::getColumn(Category::find()->asArray()->all(), 'name', 'id');
    }

    public function getAllCategories(): array
    {
        $category = $this;
        $result_list[] = $category;
        while ($category->parent_category_id) {
            $category = $category->parentCategory;
            $result_list[] = $category;
        }
        return array_reverse($result_list);
    }
}
