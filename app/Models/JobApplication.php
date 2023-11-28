<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        "cover_letter",
        "user_id",
        "job_id"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}