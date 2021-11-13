<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'content',
        'title'
    ];

    public function teacher():BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
