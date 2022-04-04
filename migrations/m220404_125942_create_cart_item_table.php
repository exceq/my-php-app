<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shopping_cart}}`.
 */
class m220404_125942_create_cart_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart_item}}', [
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'count' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey( 'cart_item_pk', 'cart_item', ['user_id', 'product_id']);
        $this->addForeignKey(
            'fk-cart_item-user_id',
            'cart_item',
            'user_id',
            'user',
            'id',
        );
        $this->addForeignKey(
            'fk-cart_item-product_id',
            'cart_item',
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
        $this->dropForeignKey('fk-cart_item-product_id', 'cart_item');
        $this->dropForeignKey('fk-cart_item-user_id', 'cart_item');
        $this->dropPrimaryKey( 'cart_item_pk', 'cart_item');
        $this->dropTable('{{%cart_item}}');
    }
}
