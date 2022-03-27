<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_image}}`.
 */
class m220327_084314_create_product_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_image}}', [
            'product_id' => $this->integer()->notNull(),
            'image_path' => $this->string()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-product_image-product_id',
            'product_image',
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
        $this->dropTable('{{%product_image}}');
    }
}
