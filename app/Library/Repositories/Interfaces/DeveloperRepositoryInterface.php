<?php
namespace App\Library\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface DeveloperRepositoryInterface
{
    public function getAll(): Collection;
}