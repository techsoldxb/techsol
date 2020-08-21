<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\Jobcard;
use Carbon\Carbon;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will clear DB TABLE';

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
        DB::table('test')->delete();
        echo "Deleted";       

        $arr['jobcard'] = Jobcard::select('id','job_enq_number',        
        'job_fault','job_ins_remark','job_ins_date')        
        ->where('job_status_name','Inspected')
        ->where('job_ins_date', '<=', date('Y-m-d'))
        ->get();

        $current_date = Carbon::now();
        $date = Carbon::parse($current_date)->addMonths(24)->format('d-m-Y');

        $deviceInspections = DB::Jobcard('job_enq_number')
            ->orderBy('job_ins_date', 'desc')
            ->where('job_status_name','Inspected')                        
            ->where('job_ins_date', '<', Carbon::now()->subMinutes(50)->toDateTimeString());        


    }
}