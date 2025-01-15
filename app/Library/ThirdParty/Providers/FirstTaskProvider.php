<?php
namespace App\Library\ThirdParty\Providers;

use App\Library\Response\Task\TaskResponse;

class FirstTaskProvider extends Provider
{
    public function getTasks(): array 
    {
        $filePath = public_path('taskjsons/mock-one.json');

        if (file_exists($filePath)) {
            $jsonData = file_get_contents($filePath);
            
            $keyMappings = [
                'value' => 'difficulty',
                'estimated_duration' => 'estimated_duration',
            ];
            return (new TaskResponse($keyMappings))->response(json_decode($jsonData, true),$keyMappings);
        }

        return null;
    }
}
