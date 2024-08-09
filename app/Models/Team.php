<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
     protected static function boot()
    {
        parent::boot();
        static::creating(function ($team) {
            $team->slug = Str::slug($team->name.'-'.$team->designation);
        });

        static::updating(function ($team) {
        });
    }
}
