<?php

namespace frontend\interfaces;



interface ItemAttributeRepositoryInterface
{

    public function get($id);

    public function save($valueObj, $item_id);
}
