<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `address`.
 */
class m171003_084157_add_user_id_column_to_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('address','user_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('address','user_id');
    }
}
