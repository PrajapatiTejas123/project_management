<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'manager_id',
        'created_by',
        'updated_by'
    ];

    public function manager(): BelongsTo
     {
        return $this->BelongsTo(User::class,'id','manager_id');
     }

     public function user(): BelongsTo
     {
        return $this->BelongsTo(User::class,'id','user_id');
     }

     public function assignuserproject()
     {
        return $this->hasMany(AssignUserToProject::class,'project_id','id');
     }
}
