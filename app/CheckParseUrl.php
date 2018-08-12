<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckParseUrl extends Model
{
    public static function saveParseUrl( $href )
    {
        $CheckParseUrl = new CheckParseUrl();
        $CheckParseUrl->url = $href;
        $CheckParseUrl->save();
    }

    public static function resetDB()
    {
        CheckParseUrl::where('id','>=',1)->delete();
    }

}
