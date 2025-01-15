<?php
namespace App\Library\ThirdParty\TaskPlanner;

use App\Library\ThirdParty\TaskPlanner\Interfaces\TaskPlannerInterface;
use App\Models\Developer;

class TaskPlanner implements TaskPlannerInterface
{
    /**
     * This function returns tasks assigned to developers as array. 
     */
    public function assignJobs(array $tasks, array $developers): array
    {
        $assignments = [];

        $developerWorkloads = array_fill_keys(array_column($developers, 'id'), 0);

        usort($tasks, fn($a, $b) => $b['difficulty'] <=> $a['difficulty']);

        foreach ($tasks as $task) {
            $bestDeveloperId = array_reduce(
                array_keys($developerWorkloads), 
                function ($available_developer_id, $developer_id) use ($developerWorkloads) {
                    if ($available_developer_id === null) {
                        return $developer_id; 
                    }
                    return $developerWorkloads[$available_developer_id] <= $developerWorkloads[$developer_id] ? $available_developer_id : $developer_id;
                }, 
                array_key_first($developerWorkloads) 
            );

            $developer = Developer::find($bestDeveloperId);
            $timeRequired = $task['difficulty'] / $developer->power;
            $assignments[] = [
                'developer_id' => $bestDeveloperId,
                'difficulty_level' => $task['difficulty'],
                'estimated_time' => $timeRequired,
            ];

            $developerWorkloads[$bestDeveloperId] += $timeRequired;
        }

        return $assignments;
    }
}
