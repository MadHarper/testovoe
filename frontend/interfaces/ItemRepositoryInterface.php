<?php

namespace frontend\interfaces;



interface ItemRepositoryInterface
{

    public function get($id);

    public function save($full_name, $parsed);
}
