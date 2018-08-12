<?php

namespace App\Repositories;


class RepositoriesData implements RepositoriesDataInterface
{

    protected $count_img;
    protected $time;
    protected $url;

    public function __construct( $searchCountImg, $time, $url )
    {
        $this->searchCountImg = $searchCountImg;
        $this->time = $time;
        $this->url = $url;
    }

    public function getsearchCountImg()
    {
        return $this->searchCountImg;
    }

    public function gettime()
    {
        return $this->time;
    }

    public function geturl()
    {
        return $this->url;
    }

}