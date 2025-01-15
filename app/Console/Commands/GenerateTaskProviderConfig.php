<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateTaskProviderConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task-planner:generate-config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the Task Planner config file.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $configPath = config_path('task_providers.php');

        if (file_exists($configPath)) {
            $this->warn('task_providers.php is already exists.');
            return;
        }

        $defaultProviders = [
            //
        ];

        $configContent = "<?php\n\nreturn " . var_export($defaultProviders, true) . ";\n";

        file_put_contents($configPath, $configContent);

        $this->info('task_providers.php config file was created.');
    }
}
