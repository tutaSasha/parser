<?php

namespace App\Parser;


use App\CheckParseUrl;
use App\DataParseUrl;
use App\Jobs\JobParserQueue;
use App\Repositories\DispatchDataInterface;
use App\Repositories\Repositories;
use App\Repositories\RepositoriesData;
use App\Repositories\RepositoriesModel;
use Illuminate\Queue\Queue;
use Illuminate\Support\Facades\DB;
use Sunra\PhpSimple\HtmlDomParser;

class ParserQueue
{

    protected $time;
    protected $checkMaxCountPage = true;
    protected $DispatchData;


    public function __construct( DispatchDataInterface $DispatchData )
    {
        $this->DispatchData = $DispatchData;
        $this->DispatchData->decrementDepth();
        $this->time = microtime(true);
    }

    public function run()
    {
        $this->serchAndDispatch();
    }

    protected function serchAndDispatch()
    {
        if($html=$this->getHtml()){
            $searchCountImg = $this->searchCountImg($html->find('img'));
            $this->SendDispatch($html->find('a'));
            if ($this->checkMaxCountPage())
                DataParseUrl::SaveDataParseUrl(new RepositoriesData($searchCountImg, $this->time(), $this->DispatchData->geturl()));
        }
    }

    protected function getHtml(){
        try{
          return HtmlDomParser::file_get_html($this->DispatchData->geturl(), $use_include_path = false, $context = null, $offset = 0);
        }catch (\Exception $e){
           return false;
        }
    }

    protected function checkMaxCountPage()
    {
        if (!empty($this->DispatchData->getMaxCountPage())) {
            $getCountRows = DataParseUrl::getCountRows();
            if ($getCountRows >= $this->DispatchData->getMaxCountPage()) {
                DB::table('jobs')->delete();
                return false;
            }
        }
        return true;
    }

    protected function searchCountImg( $htmlElements )
    {
        $counter = 0;
        if (isset($htmlElements) && is_array($htmlElements)) {
            foreach ($htmlElements as $element) {
                if (isset($element->src) && !empty($element->src) && preg_match($this->paternImg(), $element->src)) {
                    $counter++;
                }
            }
        }
        return $counter;
    }

    protected function SendDispatch( $htmlElements )
    {
        if ($this->DispatchData->getdepth() >= 0)
            if (isset($htmlElements) && is_array($htmlElements)) {
                foreach ($htmlElements as $element) {
                    if (isset($element->href) && !empty($element->href) && preg_match($this->paternUrl(), $element->href)) {
                        /*ToDo дописать подключение Redis || Memcached что-то пошустрее чем БД. */
                        $CheckParseUrl = CheckParseUrl::where('url', '=', $element->href)->first();
                        if (!$CheckParseUrl) {
                            CheckParseUrl::saveParseUrl($element->href);
                            /*ToDo Нужно придумать задержку что б сайт не забанил количеством запросов. */
                            $this->DispatchData->seturl($element->href);
                            dispatch(new JobParserQueue($this->DispatchData));
                        }
                    }
                }
            }
        return;
    }

    protected function paternUrl()
    {
        $patern = preg_quote($this->DispatchData->getOriginUrl());
        $patern = str_replace("/", "\/", $patern);
        $patern = "/^$patern/";
        return $patern;
    }

    protected function paternImg()
    {
        $patern = preg_quote($this->DispatchData->getOriginUrl());
        $patern = str_replace("/", "\/", $patern);
        $patern = "/^$patern/";
        return $patern;
    }

    protected function time()
    {
        return $time = microtime(true) - $this->time;;
    }

    public static function preStartFunction($startUrl)
    {
        CheckParseUrl::resetDB();
        DataParseUrl::resetDB();
        DB::table('jobs')->delete();
        DB::table('failed_jobs')->delete();
        CheckParseUrl::saveParseUrl($startUrl);
    }
}