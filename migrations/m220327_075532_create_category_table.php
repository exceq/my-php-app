<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m220327_075532_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'transliterated_name' => $this->string()->notNull()->unique(),
            'name' => $this->string(),
            'parent_category_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-category-category_id',
            'category',
            'parent_category_id',
            'category',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-category-category_id', 'category');
        $this->dropTable('{{%category}}');
    }
}
