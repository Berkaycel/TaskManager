<?php
namespace App\Library\ThirdParty\Providers\Factories\Interfaces;

use App\Library\ThirdParty\Providers\Provider;

interface TaskProviderFactoryInterface
{
    public static function create(string $class, string $apiUrl, array $options = []): Provider;
}