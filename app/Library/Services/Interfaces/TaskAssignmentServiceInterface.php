<?php
namespace App\Library\Services\Interfaces;

interface TaskAssignmentServiceInterface
{
    public function assignJobsFromJson(): void;
}