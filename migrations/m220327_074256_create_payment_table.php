<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m220327_074256_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id' => $this->primaryKey(),
            'date' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'amount' => $this->float()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-payment-user_id',
            'payment',
            'user_id',
            'user',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-payment-user_id', 'payment');
        $this->dropTable('{{%payment}}');
    }
}
