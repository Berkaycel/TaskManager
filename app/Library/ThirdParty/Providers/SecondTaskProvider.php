<?php
namespace App\Library\ThirdParty\Providers;

use App\Library\Response\Task\TaskResponse;

class SecondTaskProvider extends Provider
{
    public function getTasks(): array 
    {
        $filePath = public_path('taskjsons/mock-two.json');

        if (file_exists($filePath)) {
            $jsonData = file_get_contents($filePath);
            $keyMappings = [
                'zorluk' => 'difficulty',
                'sure' => 'estimated_duration',
            ];
            return (new TaskResponse($keyMappings))->response(json_decode($jsonData, true),$keyMappings);
        }

        return null;
    }
}
