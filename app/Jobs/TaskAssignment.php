<?php

namespace App\Jobs;

use App\Library\Services\Interfaces\TaskAssignmentServiceInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TaskAssignment implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly TaskAssignmentServiceInterface $taskAssignmentService)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->taskAssignmentService->assignJobsFromJson();
    }
}
