<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "item_attribute".
 *
 * @property integer $id
 * @property string $brand
 * @property string $model
 * @property string $width
 * @property string $height
 * @property string $construction
 * @property string $diameter
 * @property string $load_idx
 * @property string $load_speed
 * @property string $season
 * @property string $camer
 * @property string $runflat
 * @property string $abbr
 * @property integer $item_id
 *
 * @property Item $item
 */
class ItemAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand', 'model', 'width', 'height', 'construction', 'diameter', 'load_idx', 'load_speed', 'season', 'item_id'], 'required'],
            [['item_id'], 'integer'],
            [['brand', 'model', 'width', 'height', 'construction', 'diameter', 'load_idx', 'load_speed', 'season', 'camer', 'runflat', 'abbr'], 'string', 'max' => 255],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Brand',
            'model' => 'Model',
            'width' => 'Width',
            'height' => 'Height',
            'construction' => 'Construction',
            'diameter' => 'Diameter',
            'load_idx' => 'Load Idx',
            'load_speed' => 'Load Speed',
            'season' => 'Season',
            'camer' => 'Camer',
            'runflat' => 'Runflat',
            'abbr' => 'Abbr',
            'item_id' => 'Item ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }
}