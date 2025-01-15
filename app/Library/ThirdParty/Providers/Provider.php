<?php
namespace App\Library\ThirdParty\Providers;

use App\Library\ThirdParty\Providers\Factories\TaskProviderFactory;
use App\Library\ThirdParty\Providers\Interfaces\TaskFactory;
use Illuminate\Support\Facades\Log;

abstract class Provider implements TaskFactory
{
    protected string $apiUrl;
    protected array $options;

    public function __construct(string $apiUrl, array $options = [])
    {
        $this->apiUrl = $apiUrl;
        $this->options = $options;
    }
    
    /**
     * Returns all tasks from services.
     *
     * @return array
     */
    public static function getAllTasks(): array
    {
        $tasks = [];
        $providers = config('task_providers');

        foreach ($providers as $providerConfig) {
            try {
                $provider = TaskProviderFactory::create(
                    $providerConfig['class'],
                    $providerConfig['apiUrl'],
                    $providerConfig['options']
                );

                $providerTasks = $provider->getTasks() ?? [];
                $tasks = array_merge($tasks, $providerTasks);

            } catch (\Throwable $e) {
                Log::error("Error fetching tasks from provider: {$providerConfig['class']}. Error: {$e->getMessage()}");
                continue;
            }
        }

        return $tasks;
    }
}
