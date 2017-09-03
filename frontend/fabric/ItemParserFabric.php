<?php

namespace frontend\fabric;

use frontend\services\TyreParser;
use frontend\models\ItemValueObject;


class ItemParserFabric
{

    public function create($type)
    {
        switch($type) {
            case 'tyre':
                $valueObject = new ItemValueObject();
                $parser = new TyreParser($valueObject);
                break;
        }
        return $parser;
    }
}
