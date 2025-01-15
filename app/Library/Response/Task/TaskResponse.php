<?php
namespace App\Library\Response\Task;

use App\Library\Response\Task\Interfaces\TaskResponseInterface;

class TaskResponse implements TaskResponseInterface
{
    /**
     * Normalize an array with given mappings.
     *
     * @param array $data
     * @param array $keyMappings
     * @return array
     */
    public function response(array $data, array $keyMappings): array
    {
        return array_map(function ($item) use ($keyMappings) {
            return $this->normalizeItem($item, $keyMappings);
        }, $data);
    }

    /**
     * Normalize a single item with given mappings.
     *
     * @param array $item
     * @param array $keyMappings
     * @return array
     */
    public function normalizeItem(array $item, array $keyMappings): array
    {
        $normalized = [];

        foreach ($item as $key => $value) {
            $normalizedKey = $keyMappings[$key] ?? $key;
            $normalized[$normalizedKey] = $value;
        }

        return $normalized;
    }
}
