<?php

namespace App\Repositories;


class DispatchData implements DispatchDataInterface
{

    public $url;
    public $origin_url;
    public $depth;
    public $MaxCountPage;

    /*ToDo после тестирования сделать большым $depth*/
    public function __construct( $url, $depth = 10000, $origin_url = '' )
    {
        $this->url = $url;
        $this->depth = $depth;
        if ($origin_url != '') {
            $this->origin_url = $origin_url;
        } else {
            $this->origin_url = $url;
        }
    }

    public function geturl()
    {
        return $this->url;
    }

    public function seturl( $url )
    {
        $this->url = $url;
    }

    public function getOriginUrl()
    {
        return $this->origin_url;
    }

    public function getdepth()
    {
        return $this->depth;
    }

    public function setdepth( $depth )
    {
        return $this->depth;
    }

    public function decrementDepth()
    {
        return $this->depth--;
    }

    public function setMaxCountPage( $MaxCountPage )
    {
        $this->MaxCountPage = $MaxCountPage;
    }

    public function getMaxCountPage()
    {
        return $this->MaxCountPage;
    }
}