<?php
namespace App\Library\Repositories;

use App\Library\Repositories\Interfaces\DeveloperRepositoryInterface;
use App\Models\Developer;
use Illuminate\Database\Eloquent\Collection;

class DeveloperRepository implements DeveloperRepositoryInterface
{
    public function getAll(): Collection
    {
        return Developer::with('weeklyTasks')->get();
    }
}
