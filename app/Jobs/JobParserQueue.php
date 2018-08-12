<?php

namespace App\Jobs;

use App\Parser\ParserQueue;
use App\Repositories\DispatchDataInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class JobParserQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 25;
    protected $DispatchData;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(DispatchDataInterface $DispatchData)
    {
        $this->DispatchData=$DispatchData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $parserQueue =  new ParserQueue($this->DispatchData);
       $parserQueue->run();
    }
}
