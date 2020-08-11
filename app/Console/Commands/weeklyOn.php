<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobcard;

class weeklyOn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weeklyOn:completed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will send the SMS to the completed job customers';

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
        
        $arr['jobcard'] = Jobcard::select('id','job_enq_number','job_enq_date'
        ,'job_cust_name','job_cust_mobile','job_item_type','job_item_brand','job_item_model'
        ,'job_fault','job_status_name','job_completed_date')
        ->where(function($query)
        {
            $query->where('job_status_name', '=', 'Completed')
                  ->orWhere('job_status_name', '=', 'Outside_Received');
        }) 
        ->get();

        echo "SMS Sent";

    }
}
