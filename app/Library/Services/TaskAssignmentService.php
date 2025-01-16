<?php
namespace App\Library\Services;

use App\Library\Services\Interfaces\TaskAssignmentServiceInterface;
use App\Library\ThirdParty\Providers\Provider;
use App\Library\ThirdParty\TaskPlanner\Interfaces\TaskPlannerInterface;
use App\Models\Developer;
use App\Models\WeeklyTask;
use Illuminate\Support\Facades\DB;

class TaskAssignmentService implements TaskAssignmentServiceInterface
{
    public function __construct(
        private readonly TaskPlannerInterface $taskPlanner
    ){}

    public function assignJobsFromJson(): void
    {
        ## Tip: These incoming tasks might set to queue. It would be better.
        $tasks = Provider::getAllTasks();

        ## Tip: The following code should be used in the queue consumer to ensure reliability & stability metrics.
        $developers = Developer::orderBy('power', 'DESC')->get()->keyBy('id')->toArray();

        ## Assignment process begins
        $assignments = $this->taskPlanner->assignJobs($tasks, $developers);

        foreach ($assignments as $assignment) {
            DB::transaction(function() use($assignment){
                WeeklyTask::create([
                    "developer_id" => $assignment['developer_id'],
                    "difficulty_level" => $assignment['difficulty_level'],
                    "task_development_time" => $assignment['estimated_time']
                ]);
            });
        }
    }
}
