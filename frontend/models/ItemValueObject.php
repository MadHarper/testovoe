<?php

namespace frontend\models;

use yii\base\Model;

class ItemValueObject extends Model
{
    private $brand;
    private $model;
    private $width;
    private $height;
    private $construction;
    private $diameter;
    private $loadidx;
    private $loadspeed;
    private $season;
    private $camer = NULL;
    private $runflat = NULL;
    private $abbr = NULL;

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getConstruction()
    {
        return $this->construction;
    }

    /**
     * @param mixed $construction
     */
    public function setConstruction($construction)
    {
        $this->construction = $construction;
    }

    /**
     * @return mixed
     */
    public function getDiameter()
    {
        return $this->diameter;
    }

    /**
     * @param mixed $diameter
     */
    public function setDiameter($diameter)
    {
        $this->diameter = $diameter;
    }

    /**
     * @return mixed
     */
    public function getLoadidx()
    {
        return $this->loadidx;
    }

    /**
     * @param mixed $load_idx
     */
    public function setLoadidx($loadidx)
    {
        $this->loadidx = $loadidx;
    }

    /**
     * @return mixed
     */
    public function getLoadspeed()
    {
        return $this->loadspeed;
    }

    /**
     * @param mixed $load_speed
     */
    public function setLoadspeed($loadspeed)
    {
        $this->loadspeed = $loadspeed;
    }

    /**
     * @return mixed
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param mixed $season
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }

    /**
     * @return null
     */
    public function getCamer()
    {
        return $this->camer;
    }

    /**
     * @param null $camer
     */
    public function setCamer($camer)
    {
        $this->camer = $camer;
    }

    /**
     * @return null
     */
    public function getRunflat()
    {
        return $this->runflat;
    }

    /**
     * @param null $runflat
     */
    public function setRunflat($runflat)
    {
        $this->runflat = $runflat;
    }

    /**
     * @return null
     */
    public function getAbbr()
    {
        return $this->abbr;
    }

    /**
     * @param null $abbr
     */
    public function setAbbr($abbr)
    {
        $this->abbr = $abbr;
    }

}
