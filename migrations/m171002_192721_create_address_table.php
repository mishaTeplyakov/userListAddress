<?php

use yii\db\Migration;

/**
 * Handles the creation of table `address`.
 */
class m171002_192721_create_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'post_index' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'street' => $this->string()->notNull(),
            'num_home' => $this->integer()->notNull(),
            'num_office' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('address');
    }
}
