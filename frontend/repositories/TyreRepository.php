<?php

namespace frontend\repositories;

use frontend\interfaces\ItemAttributeRepositoryInterface;
use common\models\ItemAttribute;


class TyreRepository implements ItemAttributeRepositoryInterface
{


    public function get($id)
    {

    }

    public function save($valueObj, $item_id)
    {
        $model = new ItemAttribute();

        $model->brand = $valueObj->brand;
        $model->model = $valueObj->model;
        $model->width = $valueObj->width;
        $model->height = $valueObj->height;
        $model->construction = $valueObj->construction;
        $model->diameter = $valueObj->diameter;
        $model->load_idx = $valueObj->loadidx;
        $model->load_speed = $valueObj->loadspeed;
        $model->season = $valueObj->season;
        $model->camer = $valueObj->camer;
        $model->runflat = $valueObj->runflat;
        $model->abbr = $valueObj->abbr;

        $model->item_id = $item_id;

        $model->save();
    }
}
