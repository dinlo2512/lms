<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'teacher_id',
        'subject',
        'status',
        'total',
        'open_date',
        'close_date'
    ];

    /**
     * @return BelongsTo
     */
    public function teacher():BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * @return HasMany
     */
    public function lessons():HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    /**
     * @return HasMany
     */
    public function exercises():HasMany
    {
        return $this->hasMany(Exercise::class);
    }

    /**
     * @return HasMany
     */
    public function announcements():HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    /**
     * @return BelongsToMany
     */
    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
