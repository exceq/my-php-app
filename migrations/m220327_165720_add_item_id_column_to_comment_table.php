<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%comment}}`.
 */
class m220327_165720_add_item_id_column_to_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comment', 'product_id', $this->integer());
        $this->addForeignKey(
            'fk-comment-product_id',
            'comment',
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
        $this->dropForeignKey('fk-comment-product_id', 'comment');
        $this->dropColumn('comment', 'product_id');
    }
}
