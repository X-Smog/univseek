<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['id_user', 'id_university', 'id_criteria', 'mark'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function university()
    {
        return $this->belongsTo(university::class);
    }

    public function critere()
    {
        return $this->belongsTo(RateCriteria::class);
    }
}
