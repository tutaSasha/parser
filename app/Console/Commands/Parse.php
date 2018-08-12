<?php

namespace App\Console\Commands;

use App\Jobs\JobParserQueue;
use App\Parser\ParserQueue;
use App\Repositories\DispatchData;
use Illuminate\Console\Command;

class Parse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:run {url} {depth?} {MaxCountPage?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'запускает парсинг сайта';

    protected $dispatchData;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = $this->argument('url');
        $depth = $this->argument('depth');
        $MaxCountPage = $this->argument('MaxCountPage');
        /*ToDo дописать проверку на url */
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            try {
                /*ToDo вынести проверки */
                if (!empty($depth) || $depth == 0) {
                    $depth = (int)$depth;
                } else {
                    $depth = NULL;
                }
                $DispatchData = new DispatchData($url, $depth);
                !empty($MaxCountPage) ? $DispatchData->setMaxCountPage((int)$MaxCountPage) : NULL;

                ParserQueue::preStartFunction($url);
                dispatch(new JobParserQueue($DispatchData));
                $this->info('Парсинг сайта запущен');
            } catch (Exception $e) {
                $this->error('Возникла ошибка' . $e->getMessage());
            }
        } else {
            $this->error('Входная url не соответствует маске');
        }
    }
}
