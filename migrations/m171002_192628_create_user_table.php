<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m171002_192628_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'sex' => $this->boolean(),
            'date' => $this->date("d-m-Y H:i")->notNull(),
            'email' => $this->string()->unique()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
