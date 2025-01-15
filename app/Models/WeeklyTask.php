<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyTask extends Model
{
    use HasFactory;

    // WeeklyTask tablosunun adı
    protected $table = 'weekly_tasks';

    // Bu modeldeki hangi alanların toplu atama için izin verildiği
    protected $fillable = [
        'developer_id',
        'difficulty_level',
        'task_development_time',
    ];

    // Task'ın bağlı olduğu Developer
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}

