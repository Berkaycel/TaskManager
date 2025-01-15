<?php

namespace App\Providers;

use App\Library\Services\Interfaces\TaskAssignmentServiceInterface;
use App\Library\Services\TaskAssignmentService;
use App\Library\ThirdParty\Providers\Factories\TaskProviderFactory;
use App\Library\ThirdParty\Providers\Factories\Interfaces\TaskProviderFactoryInterface;
use App\Library\ThirdParty\TaskPlanner\Interfaces\TaskPlannerInterface;
use App\Library\ThirdParty\TaskPlanner\TaskPlanner;
use Illuminate\Support\ServiceProvider;

class RegisterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TaskPlannerInterface::class, TaskPlanner::class); ## Task Planner bind
        $this->app->bind(TaskProviderFactoryInterface::class, TaskProviderFactory::class); ## Taks Factory bing
        $this->app->bind(TaskAssignmentServiceInterface::class, TaskAssignmentService::class); ## Custom Service bind
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
