<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section1 extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'thumbnail', 'content', 'post_as'];
}
