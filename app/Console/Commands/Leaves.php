<?php

namespace App\Console\Commands;

use App\Models\EmployeesLeave;
use Illuminate\Console\Command;

class Leaves extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leaves:credit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To credit leaves in employees account monthly';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $leaves_data=EmployeesLeave::get();

        foreach ($leaves_data as $key => $value) {
            $value->recharge_count ++ ;
            $value->remaining_leaves += 2.5 ;
            $value->leaves_alloted += 2.5 ;
            $value->save();
        }

        // \Log::info('cron testing');
    }
}
