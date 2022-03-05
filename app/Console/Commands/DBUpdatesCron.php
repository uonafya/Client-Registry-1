<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use Mail;

use App\Helpers\Http;
use App\Events\AutoUpdateCREvent;

class DBUpdatesCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DBUpdates:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is a db update cron job';

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

        event(new AutoUpdateCREvent($patients));

        $this->info('Successfully update db.');
    }
}
