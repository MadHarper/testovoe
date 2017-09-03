<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $full_name
 * @property integer $parsed
 *
 * @property ItemAttribute[] $itemAttributes
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name'], 'required'],
            [['parsed'], 'integer'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'parsed' => 'Parsed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemAttributes()
    {
        return $this->hasMany(ItemAttribute::className(), ['item_id' => 'id']);
    }
}