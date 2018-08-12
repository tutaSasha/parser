<?php

namespace App\Http\Controllers;

use App\DataParseUrl;
use App\Parser\ParserQueue;
use App\Repositories\DispatchData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ParserController extends Controller
{

    public function index(  )
    {
        $DispatchData = new DispatchData('https://singularika.com/topics/automated-operator/');
        $ParserQueue = new ParserQueue($DispatchData);
        $ParserQueue->run();
        return view('main.index');
    }

    public function getResultData( Request $request )
    {
        $data = [];
        $searchCountImg = $request->get('searchCountImg');
        $url = $request->get('url');
        $time = $request->get('time');
        $sorting = $request->get('sorting');
        $table_sort = $request->get('table_sort');
        $table_results = $request->get('table_results');

        //defult filter
        $sql_filter = [];
        $sql_filter[] = ['data_parse_urls.id', '>=', 1];
        // filter company
        if (isset($searchCountImg) && !empty($searchCountImg)) {
            $sql_filter[] = ['data_parse_urls.searchCountImg', 'LIKE', "%" . $searchCountImg . "%"];
        }
        if (isset($url) && !empty($url)) {
            $sql_filter[] = ['data_parse_urls.ur', 'LIKE', "%" . $url . "%"];
        }
        if (isset($time) && !empty($time)) {
            $sql_filter[] = ['data_parse_urls.time', 'LIKE', "%" . $time . "%"];
        }
        $sql_sort_data = 'data_parse_urls.id';
        $sql_sort_method = 'asc';
        if (isset($table_sort) && ($table_sort != '')) {
            $sql_sort_data = $table_sort;
            $sql_sort_method = $sorting;
        }

        if (isset($table_results) && !empty($table_results)) {
            $table_results = $table_results;
        } else {
            $table_results = 10;
        }
        $offers = DataParseUrl::where($sql_filter)
            ->orderBy($sql_sort_data, $sql_sort_method)
            ->paginate($table_results);
        return response()->json($offers);
    }

    public function setNewParse( Request $request )
    {
        $url = $request->get('url');
        $depth = $request->get('depth');
        $MaxCountPage = $request->get('MaxCountPage');
        /*TODO разобраться почему не присылает код ошибки . */
        $exitCode = Artisan::call('parse:run', ['url' => $url, 'depth' => $depth, 'MaxCountPage' => $MaxCountPage]);
        return response()->json(['success'=>true]);
    }
}
