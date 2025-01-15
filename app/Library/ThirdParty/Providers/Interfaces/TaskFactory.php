<?php
namespace App\Library\ThirdParty\Providers\Interfaces;

interface TaskFactory
{
    public function getTasks(): array;
}