<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'phone_number',
        'terms_accepted_at',
        'role',
        'is_active',

        'terms_signature',
        'terms_signature_ip',
        'terms_signature_user_agent',

        'terms_signature_device',
        'terms_signature_device_type',
        'terms_signature_device_name',
        'terms_signature_device_manufacturer',
        'terms_signature_device_os',
        'terms_signature_device_os_version',

        'terms_signature_browser',
        'terms_signature_browser_version',
        'terms_signature_browser_language',
        'terms_signature_browser_platform',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'terms_accepted_at' => 'datetime'
        ];
    }

    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->first_name . " " . $this->last_name,
        );
    }

    protected function task(): HasMany
    {
        return $this->hasMany(task::class);
    }

    protected function project(): HasMany
    {
        return $this->hasMany(project::class);
    }
}
