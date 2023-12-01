<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Symfony\Component\CssSelector\Node\HashNode;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public function reqruiters(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function listings(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
