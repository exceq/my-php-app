<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 */
class m220402_160756_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()
        ]);
        $this->addForeignKey(
            'fk-user-role_id',
            'user',
            'role_id',
            'role',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user-role_id', 'user');
        $this->dropTable('{{%role}}');
    }
}
