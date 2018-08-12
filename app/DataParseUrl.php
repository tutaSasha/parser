<?php

namespace App;

use App\Repositories\RepositoriesDataInterface;
use Illuminate\Database\Eloquent\Model;

class DataParseUrl extends Model
{
    public static function SaveDataParseUrl( RepositoriesDataInterface $repositoriesData )
    {
        $DataParseUrl = new DataParseUrl();
        $DataParseUrl->searchCountImg = $repositoriesData->getsearchCountImg();
        $DataParseUrl->url = $repositoriesData->geturl();
        $DataParseUrl->time = $repositoriesData->gettime();
        $DataParseUrl->save();
    }

    public static function getCountRows()
    {
        return DataParseUrl::count();
    }

    public static function resetDB()
    {
        DataParseUrl::where('id','>=',1)->delete();
    }

}
