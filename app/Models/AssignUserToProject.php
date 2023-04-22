<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AssignUserToProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_id',
        'created_by',
        'updated_by',
    ];

    public function project(): HasOne
    {
       return $this->hasOne(Project::class,'id','project_id');
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
