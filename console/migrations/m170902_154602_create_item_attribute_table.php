<?php

use yii\db\Migration;

/**
 * Handles the creation of table `item_attribute`.
 */
class m170902_154602_create_item_attribute_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('item_attribute', [
            'id' => $this->primaryKey(),
            'brand' => $this->string()->notNull(),
            'model' => $this->string()->notNull(),
            'width' => $this->string()->notNull(),
            'height' => $this->string()->notNull(),
            'construction' => $this->string()->notNull(),
            'diameter' => $this->string()->notNull(),
            'load_idx' => $this->string()->notNull(),
            'load_speed' => $this->string()->notNull(),
            'season' => $this->string()->notNull(),
            'camer' => $this->string(),
            'runflat' => $this->string(),
            'abbr' => $this->string(),
            'item_id' =>$this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-item_attribute-item_id',
            'item_attribute',
            'item_id',
            'item',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('item_attribute');
    }
}
