<?php

namespace frontend\repositories;

use frontend\interfaces\ItemRepositoryInterface;
use common\models\Item;


class ItemRepository implements ItemRepositoryInterface
{


    public function get($id)
    {

    }

    public function save($full_name, $parsed)
    {
        $model = new Item();
        $model->full_name = $full_name;

        if($parsed){
            $model->parsed = 1;
        }else{
            $model->parsed = 0;
        }

        $model->save();

        return $model->id;
    }

}
