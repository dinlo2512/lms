<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grades extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exercise_id',
        'grades'
    ];

    /**
     * @return BelongsTo
     */
    public function exercise():BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }

    /**
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
