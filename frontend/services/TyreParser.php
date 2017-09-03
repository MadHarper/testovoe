<?php

namespace frontend\services;

use frontend\models\ItemValueObject;

class TyreParser
{


    // В реальности будет передоваться в конструктор, но для простоты задачи массивы задаю здесь
    private $brands = ['Nokian', 'BFGoodrich', 'Pirelli', 'Toyo', 'Continental',  'Hankook', 'Mitas'];
    private $runflats = ['RunFlat', 'Run Flat', 'ROF', 'ZP', 'SSR', 'ZPS', 'HRS', 'RFT'];
    private $camers = ['ТТ', 'TL', 'TL/TT'];
    private $seasons = ['Зимние \(шипованные\)', 'Внедорожные', 'Летние', 'Зимние \(нешипованные\)', 'Всесезонные'];
    private $valueObject;


    public function __construct(ItemValueObject $valueObject)
    {
        $this->valueObject =$valueObject;
    }


    public function parse($init_string)
    {

        //Ищем пункты 3-8
        $res = preg_match('#\s\d+\/\d+[a-z,A-Z]\d+\s\d+[a-z,A-Z]\s#', $init_string, $matches, PREG_OFFSET_CAPTURE);

        if(0 === $res){
            return false;
        }

        $string = trim($matches[0][0]);


        //детализируем пункты 3-7

        $fullArr = explode('/', $string);
        $this->valueObject->width = $fullArr[0];

        $secondArr = explode(' ', $fullArr[1]);

        $res = preg_match('#[a-z,A-Z]#', $secondArr[0], $matches2, PREG_OFFSET_CAPTURE);
        $letter_position = $matches2[0][1];

        $this->valueObject->height = substr($secondArr[0], 0, $letter_position);
        $this->valueObject->construction = substr($secondArr[0], $letter_position, 1);
        $this->valueObject->diameter = substr($secondArr[0], $letter_position + 1);
        $this->valueObject->loadidx = substr($secondArr[1], 0, -1);
        $this->valueObject->loadspeed = substr($secondArr[1], -1);



        // Бренд
        $brands_pattern = implode('|', $this->brands);

        $separator = trim($matches[0][0]);


        //Получаем массив [пункты 1-2, пункты 9-12]
        $arr = explode($separator, $init_string);
        $pattern = '#(' . $brands_pattern . ')#';
        $res = preg_match($pattern, $arr[0], $matches);

        if(0 === $res){
            return false;
        }

        $this->valueObject->brand = $matches[0];

        $brand_lenght = strlen($matches[0]);

        //если отсутствует название модели
        if($brand_lenght === strlen(trim($arr[0]))){
            return false;
        }
        $this->valueObject->model = trim(substr($arr[0], $brand_lenght));



        //находим сезон
        $last_string = $arr[1];
        $season_pattern = implode('|', $this->seasons);
        $res = preg_match('#\s(' . $season_pattern . ')#', $last_string, $matches3, PREG_OFFSET_CAPTURE);

        //если сезон не найден
        if(0 === $res){
            return false;
        }

        $last_string = trim(substr($last_string, 0, $matches3[0][1]));
        $this->valueObject->season = $matches3[0][0];



        //находим камерность
        if(strlen($last_string) > 0){
            $camer_pattern = implode('|', $this->camers);
            $res = preg_match('#(' . $camer_pattern . ')#', $last_string, $matches4, PREG_OFFSET_CAPTURE);

            if(0 != $res){
                $last_string = trim(substr($last_string, 0, $matches4[0][1]));
                $this->valueObject->camer =  $matches4[0][0];
            }
        }

        //находим ранфлет
        if(strlen($last_string) > 0) {
            $runflat_pattern = implode('|', $this->runflats);
            $res = preg_match('#(' . $runflat_pattern . ')#', $last_string, $matches5, PREG_OFFSET_CAPTURE);

            if (0 != $res) {
                $last_string = trim(substr($last_string, 0, $matches5[0][1]));
                $this->valueObject->runflat = $matches5[0][0];
            }
        }

        //находим характеризующую аббревиатуру
        if(strlen($last_string) > 0) {
            $this->valueObject->abbr =  $last_string;
        }

        return $this->valueObject;

    }
}
