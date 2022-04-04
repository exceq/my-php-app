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
            'image_path' => $this->string(400)->notNull(),
        ]);

        $this->addPrimaryKey( 'product-image_pk', 'product_image', ['product_id', 'image_path']);

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
        $this->dropForeignKey('fk-product_image-product_id', 'product_image');
        $this->dropPrimaryKey( 'product-image_pk', 'product_image');
        $this->dropTable('{{%product_image}}');
    }
}
