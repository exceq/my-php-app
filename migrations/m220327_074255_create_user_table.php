<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220327_074255_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'lastname' => $this->string(),
            'firstname' => $this->string(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'phone_number' => $this->string(),
            'registration_date' => $this->timestamp()->notNull(),
            'birthday' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
