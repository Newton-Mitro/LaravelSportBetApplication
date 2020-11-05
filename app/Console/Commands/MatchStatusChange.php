<?php

namespace App\Console\Commands;

use App\Models\Match;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MatchStatusChange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        date_default_timezone_set('Asia/Dhaka');
        $matches = Match::where('status_id',1)->get();
//        dd(date('Y-m-d H:i:s'));
        foreach ($matches as $match){
//            dd($match->start_date , Carbon::now()->format('Y-m-d'));
            if ($match->start_date == Carbon::now()->format('Y-m-d') and $match->start_time <= Carbon::now()->format('H:i:s')){
                $match->status_id = 2;
                $match->save();
                echo "Match found";
            }
        }
    }
}
