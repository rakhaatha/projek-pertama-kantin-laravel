<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Facades\Storage;

class section1 extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'thumbnail', 'content', 'post_as'];

    protected static function boot()
    {
        parent::boot();
        static::updating(function($model){
            if($model->isDirty('thumbnail') && ($model->getOriginal('thumbnail') !== null)) {
                storage::disk('public')->delete($model->getOriginal('thumbnial'));
}
        });
    }
}
