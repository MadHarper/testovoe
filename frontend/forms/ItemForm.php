<?php

namespace frontend\forms;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ItemForm extends Model
{
    public $item;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item'], 'required'],
            [['item'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item' => 'Новый товар',
        ];
    }

}
