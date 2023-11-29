<?php

namespace App\Models;

use App\Enums\ExperienceTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "institution",
        "title",
        "description",
        "start_date",
        "end_date",
        "user_id",
    ];

    protected $casts = [
        "type" => ExperienceTypeEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
