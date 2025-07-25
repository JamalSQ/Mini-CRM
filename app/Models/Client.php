<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_phone_number',
        'company_name',
        'company_address',
        'company_city',
        'company_zip',
        'company_vat'
    ];

    protected $hidden = [''];

    protected function cast(): array
    {
        return [];
    }

    protected function fullName()
    {
        return $this->first_name . $this->last_name;
    }

    protected function Projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
