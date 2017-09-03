<?php

use yii\db\Migration;

/**
 * Handles the creation of table `item`.
 */
class m170902_154540_create_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('item', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
            'parsed' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('item');
    }
}
