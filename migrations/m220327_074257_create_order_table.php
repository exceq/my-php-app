<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m220327_074257_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'date' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'payment_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-order-user_id',
            'order',
            'user_id',
            'user',
            'id',
        );

        $this->addForeignKey(
            'fk-order-payment_id',
            'order',
            'payment_id',
            'payment',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->DropForeignKey('fk-payment-user_id', 'payment');
        $this->dropForeignKey('fk-order-user_id', 'order');
        $this->dropTable('{{%order}}');
    }
}
