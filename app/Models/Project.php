<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
     use SoftDeletes,HasFactory;

    protected $fillable = ['title','description','deadline','status','client_id','user_id'];

     protected function caste():Array
    {
        return [
            'deadline'=>'datetime',
        ];
    }
    protected function task():HasMany
    {
        return $this->hasMany(task::class);
    }

    protected function user():BelongsTo
    {
        return $this->belongsTo(task::class);
    }
}
