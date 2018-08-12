<?php

namespace App\Repositories;


interface DispatchDataInterface
{
    public function geturl();

    public function seturl( $url );

    public function getOriginUrl();

    public function getdepth();

    public function setdepth( $depth );

    public function decrementDepth();

    public function getMaxCountPage();
}