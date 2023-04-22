<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'project_id',
        'employee_id',
        'planning_hours',
        'actual_hours',
        'start_date',
        'end_date',
        'status',
        'created_by',
        'updated_by'
    ];
    public function user(): HasOne
     {
        return $this->HasOne(User::class,'id','employee_id');
     }

    public function project(): HasOne
     {
        return $this->HasOne(Project::class,'id','project_id');
     }
}
