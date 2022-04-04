<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
      'content',
      'course_id',
      'lesson_id',
      'deadline',
      'grade'
    ];

    /**
     * @return BelongsTo
     */
    public function course():BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * @return BelongsTo
     */
    public function lesson():BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    /**
     * @return HasMany
     */
    public function grades():hasMany
    {
        return $this->hasMany(Grades::class);
    }
}
