<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Task extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = ['title','description','deadline','client_id','project_id','user_id','status'];

    protected function caste():Array
    {
        return [
            'deadline'=>'datetime',
        ];
    }

    public function title():Attribute
    {
        return new Attribute(
            get: fn($value)=>ucfirst($value),
        );
    }

    protected function project():BelongsTo
    {
        return $this->belongsTo(project::class);
    }

    protected function client():BelongsTo
    {
        return $this->belongsTo(client::class);
    }

    protected function user():BelongsTo
    {
        return $this->belongsTo(user::class);
    }
}
