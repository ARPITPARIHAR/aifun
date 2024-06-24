<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class CaseStudy extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($study) {
            $study->slug = Str::slug($study->name);
        });

        static::updating(function ($study) {
        });
    }
}