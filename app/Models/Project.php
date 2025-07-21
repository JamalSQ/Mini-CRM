<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['title', 'description', 'deadline', 'status', 'client_id', 'user_id'];

    public function casts(): array
    {
        return [
            'status' => ProjectStatus::class,
            'deadline' => 'datetime',
        ];
    }
    public function task(): HasMany
    {
        return $this->hasMany(task::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(client::class);
    }
}
