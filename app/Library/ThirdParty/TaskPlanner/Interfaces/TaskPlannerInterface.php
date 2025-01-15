<?php
namespace App\Library\ThirdParty\TaskPlanner\Interfaces;

interface TaskPlannerInterface
{
    public function assignJobs(array $jobs, array $developers): array;
}