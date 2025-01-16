<?php

namespace App\Jobs;

use App\Library\Services\Interfaces\TaskAssignmentServiceInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

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
        try {
            $this->taskAssignmentService->assignJobsFromJson();
        } catch (\Throwable $th) {
            Log::error('An error occurred during the TaskAssignment process! Error message: '.$th->getMessage());
        }
    }
}
