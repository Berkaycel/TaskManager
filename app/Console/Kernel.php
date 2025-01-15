<?php
namespace App\Console;

use App\Jobs\TaskAssignment;
use App\Library\Services\Interfaces\TaskAssignmentServiceInterface;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new TaskAssignment(app(TaskAssignmentServiceInterface::class)))
                    ->weeklyOn(1, '00:15') 
                    ->evenOnWeeks();
    }

}
