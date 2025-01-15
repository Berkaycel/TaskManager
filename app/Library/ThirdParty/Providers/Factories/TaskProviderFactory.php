<?php

namespace App\Library\ThirdParty\Providers\Factories;

use App\Library\ThirdParty\Providers\Factories\Interfaces\TaskProviderFactoryInterface;
use App\Library\ThirdParty\Providers\Provider;

class TaskProviderFactory implements TaskProviderFactoryInterface
{
    /**
     * Creates Provider class dynamically
     *
     * @param string $class
     * @param string $apiUrl API URL
     * @param array $options 
     * @return Provider
     */
    public static function create(string $class, string $apiUrl, array $options = []): Provider
    {
        if (!class_exists($class)) {
            throw new \InvalidArgumentException("Provider class {$class} does not exist.");
        }

        $provider = new $class($apiUrl, $options);

        if (!$provider instanceof Provider) {
            throw new \RuntimeException("Class {$class} must extend Provider.");
        }

        return $provider;
    }
}
