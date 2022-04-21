<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Teacher extends Authenticatable
{
    use HasFactory, HasRoles;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'date_of_birth',
        'username',
        'address',
        'avatar',
        'email',
        'phone_number',
        'password',
        'role_id',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return HasMany
     */
    public function notification(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * @return HasMany
     */
    public function course(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
