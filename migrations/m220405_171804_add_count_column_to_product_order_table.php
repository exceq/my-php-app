<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product_order}}`.
 */
class m220405_171804_add_count_column_to_product_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product_order', 'count', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product_order', 'count');
    }
}
