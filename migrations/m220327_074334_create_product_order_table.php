<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_order}}`.
 */
class m220327_074334_create_product_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_order}}', [
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey( 'product-order_pk', 'product_order', ['order_id', 'product_id']);

        $this->addForeignKey(
            'fk-product_order-product_id',
            'product_order',
            'order_id',
            'order',
            'id',
        );

        $this->addForeignKey(
            'fk-product_order-order_id',
            'product_order',
            'product_id',
            'product',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('product-order_pk', 'product_order');
        $this->dropForeignKey('fk-product_order-product_id','product_order');
        $this->dropForeignKey('fk-product_order-order_id','product_order');
        $this->dropTable('{{%product_order}}');
    }
}
