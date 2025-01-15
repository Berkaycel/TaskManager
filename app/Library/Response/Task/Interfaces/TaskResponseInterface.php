<?php
namespace App\Library\Response\Task\Interfaces;

interface TaskResponseInterface
{
    public function response(array $data, array $keyMappings): array;
    public function normalizeItem(array $item, array $keyMappings): array;
}