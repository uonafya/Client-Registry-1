<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Http;

use App\Events\AutoUpdateCREvent;
use App\Events\SycDataApiEvent;
use App\Events\syncFacilityEvent;

use GuzzleHttp;


class syncDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:DB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command picks syncs data from other clients and syncs it to our database';

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
     * @return int
     */
    public function handle()
    {
        $data = Http::get('http://localhost:3000/patients');
        $patients = json_decode($data->getBody()->getContents());

        event(new SycDataApiEvent($patients));

        //this data is being fetched from kmfl
        // $data = Http::get('http://localhost:3000/facility');
        // $facility = json_decode($data->getBody()->getContents());
        // http://api.kmhfltest.health.go.ke/o/token/


        event(new syncFacilityEvent());


        // event(new AutoUpdateCREvent($patients));


        // return 0;
        $this->info('Syncing db with data from remote source');
    }

}
