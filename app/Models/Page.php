<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;
class Page extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($page) {
            $page->slug = Str::slug($page->name);
        });

        static::updating(function ($page) {
        });
    }
    public function parent()
    {
        return $this->belongsTo(Page::class,'parent_id');
    }


}
