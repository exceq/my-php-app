<?php

namespace app\widgets\categoryList;

use app\models\Category;
use Yii;
use yii\base\Widget;

class CategoryList extends Widget
{
    public $needSelect;

    public function run()
    {
        $all = Category::find()->all();
        return $this->render('sideBar', [
            'list' => $all,
            'categoryItems' => $this->getCategoryTree()[0]
        ]);
    }

    private function getCategoryTree(): array
    {
        $root = Category::getRootCategory();
        $items[] = $this->getChildrenItems($root)['items'];
        return $items;
    }

    private function getChildrenItems(Category $category, $depth = 0): array
    {
        $item = $this->getItemPresentation($category);
        $children = $category->getChildren();
        foreach ($children as $child) {
            $item['items'][] = $this->getChildrenItems($child, ++$depth);
        }
        return $item;
    }

    private function getItemPresentation(Category $category, $depth = 0): array
    {
        return ['label' => $category->name,
            'icon' => 'bullhorn',
            'url' => ['category/view?id=' . $category->id],
            'active' => $this->needSelect && in_array($category->id, $this->needSelect),
        ];
    }
}
