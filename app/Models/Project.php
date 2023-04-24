<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'customer', 'description', 'url', 'status'];

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}

