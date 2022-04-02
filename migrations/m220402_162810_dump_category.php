<?php

use app\models\Category;
use yii\db\Migration;

/**
 * Class m220402_162810_dump_category
 */
class m220402_162810_dump_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $arr[] = new Category(['id' => '1', 'transliterated_name' => 'adults-all-collection', 'name' => 'Одежда для мужчин и женщин', 'parent_category_id' => NULL,]);
        $arr[] = new Category(['id' => '2', 'transliterated_name' => 'girls', 'name' => 'Женщины', 'parent_category_id' => '1',]);
        $arr[] = new Category(['id' => '3', 'transliterated_name' => 'boys', 'name' => 'Мужчины', 'parent_category_id' => '1',]);
        $arr[] = new Category(['id' => '4', 'transliterated_name' => 'girls-outwear', 'name' => 'Верхняя одежда', 'parent_category_id' => '2',]);
        $arr[] = new Category(['id' => '5', 'transliterated_name' => 'girls-sweater', 'name' => 'Свитеры и джемперы', 'parent_category_id' => '2',]);
        $arr[] = new Category(['id' => '6', 'transliterated_name' => 'girls-pants', 'name' => 'Брюки', 'parent_category_id' => '2',]);
        $arr[] = new Category(['id' => '7', 'transliterated_name' => 'boys-outwear', 'name' => 'Верхняя одежда', 'parent_category_id' => '3',]);
        $arr[] = new Category(['id' => '8', 'transliterated_name' => 'boys-jeans', 'name' => 'Джинсы', 'parent_category_id' => '3',]);
        $arr[] = new Category(['id' => '9', 'transliterated_name' => 'boys-active-wear', 'name' => 'Спортивная одежда', 'parent_category_id' => '3',]);
        $arr[] = new Category(['id' => '10', 'transliterated_name' => 'girls-outwear-jacket', 'name' => 'Куртки', 'parent_category_id' => '4',]);
        $arr[] = new Category(['id' => '11', 'transliterated_name' => 'girls-outwear-windbreaker', 'name' => 'Ветровки', 'parent_category_id' => '4',]);
        $arr[] = new Category(['id' => '12', 'transliterated_name' => 'girls-sweater-pullover', 'name' => 'Джемперы', 'parent_category_id' => '5',]);
        $arr[] = new Category(['id' => '13', 'transliterated_name' => 'girls-sweater-cardigan', 'name' => 'Кардиганы', 'parent_category_id' => '5',]);
        $arr[] = new Category(['id' => '14', 'transliterated_name' => 'girls-sweater-sweater', 'name' => 'Свитеры', 'parent_category_id' => '5',]);
        $arr[] = new Category(['id' => '15', 'transliterated_name' => 'girls-pants-paperbag', 'name' => 'Paper Bag', 'parent_category_id' => '6',]);
        $arr[] = new Category(['id' => '16', 'transliterated_name' => 'girls-pants-jogger', 'name' => 'Jogger', 'parent_category_id' => '6',]);
        $arr[] = new Category(['id' => '17', 'transliterated_name' => 'girls-pants-classic', 'name' => 'Классические', 'parent_category_id' => '6',]);
        $arr[] = new Category(['id' => '18', 'transliterated_name' => 'girls-pants-skinny', 'name' => 'Зауженые', 'parent_category_id' => '6',]);
        $arr[] = new Category(['id' => '19', 'transliterated_name' => 'boys-outwear-jacket-denim', 'name' => 'Джинсовые куртки', 'parent_category_id' => '7',]);
        $arr[] = new Category(['id' => '20', 'transliterated_name' => 'boys-outwear-jacket', 'name' => 'Куртки', 'parent_category_id' => '7',]);
        $arr[] = new Category(['id' => '21', 'transliterated_name' => 'boys-jeans-jogger', 'name' => 'Jogger', 'parent_category_id' => '8',]);
        $arr[] = new Category(['id' => '22', 'transliterated_name' => 'boys-jeans-skinny', 'name' => 'Зауженые', 'parent_category_id' => '8',]);
        $arr[] = new Category(['id' => '23', 'transliterated_name' => 'boys-jeans-regular', 'name' => 'Прямые', 'parent_category_id' => '8',]);
        $arr[] = new Category(['id' => '24', 'transliterated_name' => 'boys-active-wear-sweatshirt', 'name' => 'Свитшоты', 'parent_category_id' => '9',]);
        $arr[] = new Category(['id' => '25', 'transliterated_name' => 'boys-active-wear-zipped-sweatshirt', 'name' => 'Толстовки', 'parent_category_id' => '9',]);
        $arr[] = new Category(['id' => '26', 'transliterated_name' => 'boys-active-wear-hoodie', 'name' => 'Худи', 'parent_category_id' => '9',]);
        $arr[] = new Category(['id' => '27', 'transliterated_name' => 'boys-active-wear-pants', 'name' => 'Спортивные брюки', 'parent_category_id' => '9',]);
        foreach ($arr as $item) {
            $item->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Category::deleteAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220402_162810_dump_category cannot be reverted.\n";

        return false;
    }
    */
}
