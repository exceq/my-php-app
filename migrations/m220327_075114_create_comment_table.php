<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m220327_075114_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'date'=>$this->timestamp()->notNull(),
            'mark'=>$this->integer()->notNull(),
            'text'=>$this->string(1000)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-comment-user_id',
            'comment',
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
        $this->dropForeignKey('fk-comment-user_id','comment');
        $this->dropTable('{{%comment}}');
    }
}
