<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    // Developer tablosunun adı
    protected $table = 'developers';

    // Bu modeldeki hangi alanların toplu atama için izin verildiği
    protected $fillable = [
        'name',
        'weekly_working_hours',
        'power',
    ];

    // Developer'ın haftalık görevleri (1:M ilişkisi)
    public function weeklyTasks()
    {
        return $this->hasMany(WeeklyTask::class);
    }

    // Kalan çalışma saati (çalışma saati max 45)
    public function remainingHours()
    {
        return $this->weekly_working_hours - $this->weeklyTasks->sum('task_development_time');
    }
}

