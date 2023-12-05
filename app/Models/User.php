<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\ExperienceTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'company_id',
        "profile_img_path",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function experiencesTypeGroups()
    {
        $experiences["work"] = $this->experiences()->where("type", "work")->get();
        $experiences["education"] = $this->experiences()->where("type", "education")->get();
        $experiences["other"] = $this->experiences()->where("type", "other")->get();

        return $experiences;
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function isRecruiter(): bool
    {
        return User::where('id', Auth::user()->id)->whereNotNull('company_id')->exists();
    }

    public function higlightedEducation(): ?Experience
    {
        return $this->experiences()->whereNull('end_date')->where('type', "=", ExperienceTypeEnum::Education)->first() ?: null;
    }

    public function higlightedWork(): ?Experience
    {
        return $this->experiences()->whereNull('end_date')->where('type', "=", ExperienceTypeEnum::Work)->first() ?: null;
    }

    public function initials(): string
    {
        return mb_substr($this->first_name, 0, 1) . mb_substr($this->last_name, 0, 1);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(UserTag::class);
    }
}
