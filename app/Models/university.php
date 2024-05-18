<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class university extends Model
{
    protected $fillable = ['name', 'description', 'address', 'website','email'];

    public function notations()
    {
        return $this->hasMany(Rate::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Comment::class);
    }
}
